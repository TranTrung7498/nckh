<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TopicExport implements FromArray,WithHeadings,ShouldAutoSize
{
    /**
     * @return array
     */
    protected $topic;

    public function __construct(array $topic)
    {
        $this->topic = $topic;
    }

    public function array(): array
    {
        return $this->topic;
    }

    public function headings(): array
    {
        return [
            'Tên đề tài',
            'Khoa',
            'Năm',
            'Trạng thái',
            'Xếp loại',
            'Giảng viên hướng dẫn'
        ];
    }
}
