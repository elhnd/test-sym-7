// ffi-libnotify.h
#define FFI_LIB "libnotify.so.4"

typedef bool gboolean;
typedef void* gpointer;
typedef struct _NotifyNotification NotifyNotification;

gboolean notify_init(const char *app_name);
NotifyNotification *notify_notification_new(const char *summary, const char *body, const char *icon);
gboolean notify_notification_show(NotifyNotification *notification, void **error);
void g_object_unref(gpointer object);
