<?php
declare(strict_types = 1);

return [
    \GSG\Globale\Domain\Model\FileReference::class => [
        'tableName' => 'sys_file_reference',
        'recordType' => \GSG\Globale\Domain\Model\FileReference::class,
        'properties' => [
            'uid_local' => [
                'fieldName' => 'originalFileIdentifier',
            ]
        ],
    ],
];