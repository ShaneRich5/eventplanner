<?php

namespace App\Respositories\ReviewRepository;

use App\Respositories\EloquentRepository;
use App\Respositories\Review\ReviewInterface;

class ReviewRepository extends EloquentRepository implements ReviewInterface {

    protected $modelClassName = 'Review';

}