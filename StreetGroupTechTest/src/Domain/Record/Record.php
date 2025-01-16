<?php

declare(strict_types=1);

namespace App\Domain\Record;

class Record {
    private string $title;
    private string $firstName;
    private string $lastName;
    private string $initial;

    public function __construct($data)
    {
        $this->createRecord($data);
    }

    public function outputToArray(): array
    {
        return [
            'title' => $this->title,
            'first_name' => $this->firstName,
            'initial' => $this->initial,
            'last_name' => $this->lastName
        ];
    }

    protected function createRecord(array $data): void
    {
        $this->setTitle($data['title']);
        $this->setFirstName($data['first_name']);
        $this->setInitial($data['initial']);
        $this->setLastName($data['last_name']);
    }

    protected function setTitle($title): void
    {
        $this->title = $title;
    }

    protected function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    protected function setInitial(string $initial): void
    {
        $this->initial = $initial;
    }
}
