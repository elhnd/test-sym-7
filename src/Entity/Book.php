<?php
class Book
{
    public function __construct(
        public private(set)     string  $title,
        public protected(set)   string  $author,
        protected private(set)  int     $pubYear,
    ) {}
}

class SpecialBook extends Book
{
    public function update(string $author, int $year): void
    {
        $this->author   = $author; // OK
        $this->pubYear  = $year; // Erreur Fatale
    }
}

$b = new Book('Comment utiliser PHP', 'Peter H. Peterson', 2024);

echo $b->title; // Fonctionne
echo $b->author; // Fonctionne
echo $b->pubYear; // Erreur Fatale

$b->title = 'Comment ne pas utiliser PHP'; // Erreur Fatale
$b->author = 'Pedro H. Peterson'; // Erreur Fatale
$b->pubYear = 2023; // Erreur Fatale