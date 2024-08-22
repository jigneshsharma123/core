<?php
/*
 * Dynmic_menu.php
 */
namespace App\Libraries;
use App\Models\Menu_item;
use App\Models\Menus_model;
use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;

class Dynamic_menu { 
    protected $db;
    private $ci;            // para CodeIgniter Super Global Referencias o variables globales
    private $id_menu        = '';
    private $class_menu = '';
    private $class_nav = '';
    private $id_nav = '';
    private $class_nav_item = '';
    private $class_nav_item_a = '';
    private $class_nav_parent = '';
    private $class_nav_parent_item = '';
    private $class_nav_parent_item_a = '';
    private $class_child_nav = '';
    private $class_child_nav_item = '';
    private $class_child_nav_item_a = '';
    private $showicon    = false;
    public $config = array();
    // --------------------------------------------------------------------
    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->db =& $db;
        helper('inflector');
    }
    // --------------------------------------------------------------------
     /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return    string    $html_out using CodeIgniter achor tags.
     */
 
    public  function build_menu($type = '', $id = '')
    { 
        $this->id_menu = $this->config['id_menu'];
        $this->class_menu = $this->config['class_menu']; //for top div
        $this->class_nav = $this->config['class_nav']; //for top ul
        $this->id_nav = $this->config['id_nav']; //for top ul
        $this->class_nav_item = $this->config['class_nav_item']; //for top ul -> li
        $this->class_nav_item_a = $this->config['class_nav_item_a'];//for top ul -> li -> a
        $this->class_nav_parent_item = $this->config['class_nav_parent_item'];//for top ul -> li, if it has child ul
        $this->class_nav_parent_item_a = $this->config['class_nav_parent_item_a'];//for top ul -> li -> a, if it has child ul
        $this->class_child_nav = $this->config['class_child_nav']; //for child ul
        $this->class_child_nav_item = $this->config['class_child_nav_item']; //for child ul -> li
        $this->class_child_nav_item_a = $this->config['class_child_nav_item_a']; //for child ul -> li -> a
        $this->showicon = $this->config['showicon'];
        $menu = array();
        // now we will build the dynamic menus.
        if ($this->class_menu == "") {
          $html_out  = '';
        } else {
          $html_out  = '<div class="'.$this->class_menu.'">';
        }
        /**
         * check $type for the type of menu to display.
         *
         * ( 0 = top menu ) ( 1 = horizontal ) ( 2 = vertical ) ( 3 = footer menu ).
         */            // 1 = horizontal menu
        if ($type != "")
        { 
          $menu_items = new \App\Models\Menu_item();
          $query =$menu_items->query("select * from menu_items where menu_id in (select id from menus where position = '".strtolower($type)."') order by sort_order asc");
        }
        else
        {
          if ($id != "")
          {
            $menu_items = new \App\Models\Menu_item();
            $query = $menu_items->db->query("select * from menu_items where menu_id = $id order by sort_order asc");
          }
        }
        $html_out .= "\t\t".'<ul class="'.$this->class_nav.'" id="'.$this->id_nav.'">'."\n";
 
    // me despliega del query los rows de la base de datos que deseo utilizar

        foreach ($query->getResult() as $row)
        {
          $id = $row->id;
          $title = $row->label; 
          //$custom_menu_class = $row->menu_class;
					$slug = $row->slug;
          $url = $row->url;
          $module = $row->module;
          
          if ($module != 'pages') {
            if ($url == "")
            {
             // $query1 = $this->ci->db->query("select * from ".$row->module." where id = ".$row->module_id);
             // $row1 = $query1->result();
              $url = base_url().'/'.plural($module).'/'.$row->slug;
            }
          } else {
            if ($url == "")
            {
             // $query1 = $this->ci->db->query("select * from ".$row->module." where id = ".$row->module_id);
             // $row1 = $query1->result();
              $url = base_url().'/'.$row->slug;
            }
          }
          
          $target = "_self"; #$row->target_window;
          $parent_id = $row->parent_id;
          $is_parent = $row->is_parent;
          $show_menu = 'active'; #$row->status;

          if ($show_menu == "active" && $parent_id == 0)   // are we allowed to see this menu?
          {
            if ($is_parent == 1)
            {
            // CodeIgniter's anchor(uri segments, text, attributes) tag.
              if ($this->showicon == true)
                  $showtitle = $title.' <span class="caret"></span>';
              else
                  $showtitle = $title;
              
              $html_out .= "\t\t\t".'<li class="'.$this->class_nav_parent_item.'"><a href="'.$url.'" title="'.$title.'" class="'.$this->class_nav_parent_item_a.'" name="'.str_replace(" ","_",$title).'"  id="'.$id.'" data-bs-toggle="dropdown" target="'.$target.'">'.$showtitle.'</a>';
              $html_out .= $this->get_childs($id, $this->class_child_nav);
            }
            else
            {
              $html_out .= "\t\t\t".'<li class="'.$this->class_nav_item.'">'.anchor($url, $title, '  name="'.str_replace(" ","_",$title).'" id="'.$id.'" class="'.$this->class_nav_item_a.'" target="'.$target.'"');
            }
          }

        }
         // loop through and build all the child submenus.
 
        $html_out .= '</li>'."\n";
        $html_out .= "\t\t".'</ul>' . "\n";
        if ($this->class_menu != "") {
          $html_out .= '</div>';
        }
      
 
        return $html_out;
    }
     /**
     * get_childs($menu, $parent_id) - SEE Above Method.
     *
     * Description:
     *
     * Builds all child submenus using a recurse method call.
     *
     * @param    mixed    $id
     * @param    string    $id usuario
     * @return    mixed    $html_out if has subcats else FALSE
     */
    function get_childs($id, $ul_class)
    {
      $menu_items = new \App\Models\Menu_item();
      $has_subcats = FALSE;
      $html_out  = '';
      $html_out .= "\t\t\t\t\t".'<ul class="'.$ul_class.'">'."\n";
      // query q me ejecuta el submenu filtrando por usuario y para buscar el submenu segun el id que traigo
      $query = $menu_items->query("select * from menu_items where parent_id = $id order by sort_order asc");

      foreach ($query->getResult() as $row)
      {
        $id = $row->id;
        $title = $row->label;
        $slug = $row->slug;
        $url = $row->url;
        $module = $row->module;
        
        if ($module != 'pages') {
          if ($url == "")
          {
           // $query1 = $this->ci->db->query("select * from ".$row->module." where id = ".$row->module_id);
           // $row1 = $query1->result();
            $url = base_url().'/'.plural($module).'/'.$row->slug;
          }
        } else {
          if ($url == "")
          {
           // $query1 = $this->ci->db->query("select * from ".$row->module." where id = ".$row->module_id);
           // $row1 = $query1->result();
            $url = base_url().'/'.$row->slug;
          }
        }

        $target = "_self"; #$row->target_window;
        $parent_id = $row->parent_id;
        $is_parent = $row->is_parent;
        $show_menu = 'active'; #$row->status;
        

        $has_subcats = TRUE;
        if ($show_menu == "active") 
        {
          if ($is_parent == 1)
          {
            $html_out .= "\t\t\t\t\t\t".'<li class="'.$this->class_child_nav_item.'">'.anchor($url.' ',$title, ' class="'.$this->class_child_nav_item_a.'" name="'.str_replace(" ","_",$title).'" id="'.$id.'" target="'.$target.'"');
            // Recurse call to get more child submenus.
            //$html_out .= $this->get_childs($id, 'inner-sub-menu');

          }
          else
          {
             $html_out .= "\t\t\t\t\t\t".'<li class="'.$this->class_child_nav_item.'">'.anchor($url,$title, ' class="'.$this->class_child_nav_item_a.'" name="'.str_replace(" ","_",$title).'" id="'.$id.'" target="'.$target.'"');
          }

        }
      }
      $html_out .= '</li>' . "\n";
      $html_out .= "\t\t\t\t\t".'</ul>' . "\n";
      return ($has_subcats) ? $html_out : FALSE;
 
    }
}
