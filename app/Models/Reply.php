<?php

namespace App\Models;

use App\Models\Replyable;
use App\Traits\HasAuthor;
use Illuminate\Support\Str;
use App\Traits\ModelHelpers;
use App\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reply extends Model
{
    use HasFactory;
    use HasAuthor;
    use HasTimestamps;
    use ModelHelpers;

    protected $table = "replies";

    protected $fillable = [
        'body'
    ];

    public function id(): int {
        return $this->id;
    }
    public function body(): string {
        return $this->body;
    }

    public function excerpt(int $limit = 200): string {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function to(Replyable $replyable) {
        return $this->replyableRelation()->associate($replyable);
    }

    public function replyable(): Replyable {
        return $this->replyableRelation;
    }

    public function replyableRelation(): MorphTo {
        return $this->morphTo('replyableRelation', 'replyable_type', 'replyable_id');
    }
}
