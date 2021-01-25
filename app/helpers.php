<?php 
function front_menu($MenuPagemodel,$menu_id, $classes = ''){
	$html = '';
	$main_ul_class = isset($classes['submenu']) ? $classes['submenu'] : '';
	$html .= '<div class="col-xl-7 col-lg-9 col-sm-3 col-3"><div class="mainmenu"><ul class="'.$main_ul_class.'"><nav>';
	$html .= getMenusHtml($MenuPagemodel,$menu_id,0,0,'',$classes);
	$html .= '</nav><ul></div></div>';
	
	
	return  $html;
}

function getMenusHtml($MenuPagemodel,$menu_id,$parent_id = 0,$lavel, $html='',$classes = ''){		
if(!empty($menu_id)){
	$records = $MenuPagemodel::where('menu_id',$menu_id)->where('parent_id',$parent_id)->OrderBy('sort_number','ASC')->get();
	
	if(!empty($records)){
		$i = 1;
		$lavel = $lavel + 1;
		
		foreach($records as $record){
			
			$menusArr  = array();
			$menusArr['children'] = getChildMenusList($MenuPagemodel,$menu_id,$record['id']);
			
			$main_li_class= isset($classes['submenu']) ? $classes['submenu'] : '';
			$target = ($record['new_tab'] == 1) ? '_blank' : '';
			if(!empty($menusArr['children'])){
				$child_ul_class =  isset($classes['submenu sub-2']) ? $classes['submenu sub-2'] : '';
			}					
			$html .= '<li class="'.$main_li_class.'">';
			$slug = str_replace('#BASE_URL',URL::to('/'),$record['slug']);
			$html .= '<a href="'.$slug.'" target="'.$target.'">';
			$html .= $record['title'];
			$html .= '</a>';
			
			if(!empty($menusArr['children'])){
				$sub_child_ul_class = ($lavel > 1) ? 'main-nav__sub-2' : '';
				$html .= '<ul class="'.$child_ul_class.$sub_child_ul_class.'">';
				$html .= getMenusHtml($MenuPagemodel,$menu_id,$record['id'],$lavel);
				$html .= '</ul>';
			}else{
				unset($menusArr['children']);
			}
			$html .= '</li>';
			$i++;
		}				
	}
	return $html;
}		
}

function getChildMenusList($MenuPagemodel,$menu_id,$parent_id = 0){
	$menus = array();
	if(!empty($menu_id)){
		$records = $MenuPagemodel::where('menu_id',$menu_id)->where('parent_id',$parent_id)->OrderBy('sort_number','ASC')->get();
		
		if(!empty($records)){
			$i = 1;
			foreach($records as $record){
				
				$menusArr  = array();
				$menusArr['id'] = $record['id'];
				$menusArr['text'] = $record['title'];
				$menusArr['href'] = $record['slug'];
				$menusArr['page_type'] = $record['page_type'];
				$menusArr['parent_id'] = $record['parent_id'];
				$menusArr['sort_number'] = $record['sort_number'];
				
				$menus[$record['id']] = $menusArr;
				
				$i++;
			}
			//echo '<pre>menus='; print_r($menus); die;
		}
		
		$menus = !empty($menus) ? array_values($menus) : '';
		return $menus;
	}
	
}
?>