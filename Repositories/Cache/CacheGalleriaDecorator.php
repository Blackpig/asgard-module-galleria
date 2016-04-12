<?php namespace Modules\Galleria\Repositories\Cache;

use Modules\Galleria\Repositories\GalleriaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheGalleriaDecorator extends BaseCacheDecorator implements GalleriaRepository
{
    public function __construct(GalleriaRepository $galleria)
    {
        parent::__construct();
        $this->entityName = 'galleria.galleries';
        $this->repository = $galleria;
    }
}
