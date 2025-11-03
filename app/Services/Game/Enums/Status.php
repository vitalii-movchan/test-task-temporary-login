<?php

namespace App\Services\Game\Enums;

enum Status: int
{
    case Pending = 0;

    case Loose =  1;

    case Win = 2;

    /**
     * @return string
     */
    public function title(): string {
        return match($this) {
            Status::Pending => 'Pending',
            Status::Loose => 'Loose',
            Status::Win => 'Win',
        };
    }
}
