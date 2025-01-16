<?php

declare(strict_types=1);

namespace App\Domain\Data;

use App\Domain\Record\Record;

class Data {
    const TITLES = [
        'Mr',
        'Mister',
        'Dr',
        'Doctor',
        'Mrs',
        'Ms',
        'Miss',
        'Prof',
        'Professor'
    ];

    const REPLACE = [
        'Mister' => 'Mr',
        'Doctor' => 'Dr',
        'Professor' => 'Prof',
        '&' => 'and',
        '.' => ''
    ];

    const EXCLUDE = [
        'homeowner',
        ' ',
        ''
    ];

    private $oldData;
    private $newData;

    public function __construct($uploadedFile)
    {
        $this->oldData = $this->getRawCsvData($uploadedFile);
    }

    public function processData($data)
    {
        $this->newData = $this->process($data);
    }

    public function getOldData(): array
    {
        return $this->oldData;
    }

    public function getNewData(): array
    {
        return $this->newData;
    }

    protected function getRawCsvData($uploadedFile): array
    {
        $allRawData = [];

        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            if (($handle = fopen($uploadedFile->getFilePath(), 'r')) !== FALSE) {
                while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                    $allRawData[] = $data;
                }

                fclose($handle);
            }
        }

        return $allRawData;
    }

    protected function process(array $allRawData): array
    {
        $output = [];

        for($i = 0; $i < count($allRawData); $i++) {
            foreach($allRawData[$i] as $row) {
                if(!in_array($row, self::EXCLUDE)) {
                    $row = $this->sanitiseRow($row);
                    $parts = explode('and', $row);
                    
                    $records[] = $this->getShortRecord($parts);
        
                    foreach($parts as $part) {
                        $records[] = $this->getRecord(trim($part));
                    }
                }
            }
        }
    
        $records = array_filter($records);

        foreach($records as $record) {
            $output[] = $record->outputToArray();
        }

        return $output;
    }

    protected function getShortRecord(array $parts): Record|null
    {
        if(count($parts) > 1 && in_array(trim($parts[0]), self::TITLES)) {
            $secondPerson = explode(' ', $parts[1]);
            $surname = end($secondPerson);

            return new Record(
                [
                    'title' => trim($parts[0]),
                    'first_name' => '',
                    'initial' => '',
                    'last_name' => $surname
                ]
            );
        }

        return null;
    }

    protected function getRecord(string $person)
    {
        $personParts = explode(' ', $person);

        if(count($personParts) > 1) {
            return new Record(
                [
                    'title' => reset($personParts),
                    'first_name' => (strlen($personParts[1]) > 1 && count($personParts) > 2) ? $personParts[1] : '',
                    'initial' => (strlen($personParts[1]) === 1) ? $personParts[1] : '',
                    'last_name' => end($personParts)
                ]
            );
        }

        return null;
    }

    protected function sanitiseRow(string $row): string
    {
        foreach(self::REPLACE as $old => $new) {
            $row = str_replace($old, $new, $row);
        }

        return $row;
    }
}