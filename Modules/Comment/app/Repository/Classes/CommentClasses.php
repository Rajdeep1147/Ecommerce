<?php 
namespace Modules\Comment\app\Repository\Classes;

use App\Repositories\RepositoryClasses\BaseRepository;
use Modules\Comment\app\Models\Comment;
use Modules\Comment\app\Repository\Interfaces\CommentRepositoryInterface;

class CommentClasses extends BaseRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

   
    public function index(array $relation =[])
    {
        return Comment::all();
    }
}

?>