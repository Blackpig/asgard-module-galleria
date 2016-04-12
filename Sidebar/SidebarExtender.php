<?php namespace Modules\Galleria\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('galleria::galleries.title.galleries'), function (Item $item) {
                $item->weight(2);
                $item->icon('fa fa-picture-o');
                $item->route('admin.galleria.galleries.edit', 1 );
                $item->authorize(
                    $this->auth->hasAccess('galleria.galleries.edit')
                );
            });
        });

        return $menu;
    }
}
