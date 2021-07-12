<?php

namespace App\Models;

use App\Traits\HasTags;
use App\Models\Replyable;
use App\Traits\HasAuthor;
use App\Traits\HasReplies;
use Illuminate\Support\Str;
use App\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread extends Model implements Replyable
{
    use HasFactory;
    use HasTags;
    use HasAuthor;
    use HasTimestamps;
    use HasReplies;

    const TABLE = 'threads';

    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'category_id',
        'author_id'
    ];

    // protected $with = [
    //     'authorRelation',
    //     'categories',
    //     'tagsRelation'
    // ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function excerpt(int $limit = 250): string {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function replyableSubject(): string {
        return $this->title();
    }

    public function id(): string {
        return $this->id;
    }

    public function title(): string {
        return $this->title;
    }

    public function body(): string {
        return $this->body;
    }

    public function slug(): string {
        return $this->slug;
    }

    public function category_id(): int {
        return $this->category_id;
    }

    public function author_id(): int {
        return $this->author_id;
    }
    
    public function delete() {

        $this->removeTags();
        parent::delete();
    }

    public function scopeForTags(Builder $query, string $tag): Builder {
        return $query->whereHas('tagsRelation', function ($query) use ($tag) {
            $query->where('tags.slug', $tag);
        });
    }
}
