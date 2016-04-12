<?php namespace Modules\Galleria\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Galleria\Entities\Galleria;
use Modules\Galleria\Repositories\GalleriaRepository;
use Modules\Media\Repositories\FileRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class GalleriaController extends AdminBaseController
{
    /**
     * @var GalleriaRepository
     */
    private $galleria;

    public function __construct(GalleriaRepository $galleria)
    {
        parent::__construct();

        $this->galleria = $galleria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$galleries = $this->galleria->all();

        return view('galleria::admin.galleries.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('galleria::admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->galleria->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('galleria::galleries.title.galleries')]));

        return redirect()->route('admin.galleria.galleria.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Galleria $galleria
     * @return Response
     */
    public function edit(Galleria $galleria, FileRepository $fileRepository)
    {
        $galleriaFiles = $fileRepository->findMultipleFilesByZoneForEntity('galleria', $galleria);

        return view('galleria::admin.galleries.edit', compact('galleria','galleriaFiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Galleria $galleria
     * @param  Request $request
     * @return Response
     */
    public function update(Galleria $galleria, Request $request)
    {
        $this->galleria->update($galleria, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('galleria::galleries.title.galleries')]));

        return redirect()->route('admin.galleria.galleria.edit',1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Galleria $galleria
     * @return Response
     */
    public function destroy(Galleria $galleria)
    {
        $this->galleria->destroy($galleria);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('galleria::galleries.title.galleries')]));

        return redirect()->route('admin.galleria.galleria.index');
    }
}
