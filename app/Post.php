<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'post_id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = ['title', 'body', 'image', 'id'];

    public function user()
    {
        return User::where('id', $this->id)->first()->name;
    }
    public function userGender()
    {
        return User::where('id', $this->id)->first()->gender;
    }
    public function userAbout()
    {
        return User::where('id', $this->id)->first()->about;
    }
    public function tag()
    {
        return Tag::where('tag_id', $this->tag_id)->first()->tag;
    }
}