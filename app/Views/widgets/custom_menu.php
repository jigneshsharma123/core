<div class="widget">
    <div class="footer-quick-link">
        <div class="footer-widget-title">
            <?php echo (isset($data) and isset($data->title)) ? '<h5>'.$data->title.'</h5>' : ''?>
        </div>
        <div class="footer-quick-link-list">                
            <?php
            $class_menu = "";
            $menu_object = new \App\Libraries\Dynamic_menu($class_menu); 
            $menu_object->config = array(
                'showicon' => true,
                'id_menu' => '',
                'class_menu' => '',
                'class_nav' => '',
                'id_nav' => '',
                'class_nav_item' => '',
                'class_nav_item_a' => '',
                'class_nav_parent' => '',
                'class_nav_parent_item' => '',
                'class_nav_parent_item_a' => '',
                'class_child_nav' => '',
                'class_child_nav_item' => '',
                'class_child_nav_item_a' => '',
            );
            echo $menu_object->build_menu('', $data->id);
            ?>     
        </div>
    </div>
</div>
