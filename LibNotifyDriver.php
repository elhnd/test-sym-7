<?php

class LibNotify
{
    private \FFI $ffi;

    public function __construct()
    {
        $this->ffi = \FFI::cdef(
            "
            #define FFI_LIB \"libnotify.so.4\"

            typedef bool gboolean;
            typedef void* gpointer;
            typedef struct _NotifyNotification NotifyNotification;
            typedef struct _GTypeInstanceError GError;

            gboolean notify_init(const char *app_name);
            gboolean notify_is_initted(void);
            void notify_uninit(void);
            NotifyNotification *notify_notification_new(const char *summary, const char *body, const char *icon);
            gboolean notify_notification_show(NotifyNotification *notification, void **error);
            void g_object_unref(gpointer object);", 
            "libnotify.so.4"
        );

        $this->ffi->notify_init('TestFFI');
    }

    public function sendNotification(string $title, string $body): void
    {
        $notification = $this->ffi->notify_notification_new($title, $body, null);
        $this->ffi->notify_notification_show($notification, null);
        $this->ffi->g_object_unref($notification);
    }

    public function __destruct()
    {
        $this->ffi->notify_uninit();
    }
}

$driver = new LibNotify();
$driver->sendNotification('Notification LinkedIn', 'Le post a bien été publié 🎉');


