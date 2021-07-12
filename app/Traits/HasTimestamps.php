<?php

namespace App\Traits;

trait HasTimestamps {

    public function createdAt(): string {
        return $this->created_at->format('d M Y h:i A');
    }
    
    public function updatedAt(): string {
        return $this->updated_at->format('d M Y h:i A');
    }
}