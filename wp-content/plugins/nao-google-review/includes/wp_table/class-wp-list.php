<?php 
/**
 * Custom_Table_Example_List_Table class that will display our custom table
 * records in nice table
 */
class Nao_Google_Review_List_Table extends WP_List_Table
{
    /**
     * [REQUIRED] You must declare constructor and give some basic params
     */
    function __construct()
    {
        global $status, $page;
        parent::__construct(array(
            'singular' => 'person',
            'plural' => 'persons',
        ));
    }
    /**
     * [REQUIRED] this is a default column renderer
     *
     * @param $item - row (key, value array)
     * @param $column_name - string (key)
     * @return HTML
     */
    function column_default($item, $column_name)
    {
        return $item[$column_name];
    }
    /**
     * [OPTIONAL] this is example, how to render specific column
     *
     * method name must be like this: "column_[column_name]"
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_age($item)
    {
        return '<em>' . $item['name'] . '</em>';
    }
    /**
     * [OPTIONAL] this is example, how to render column with actions,
     * when you hover row "Edit | hide" links showed
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_name($item)
    {
        // links going to /admin.php?page=[your_plugin_page][&other_params]
        // notice how we used $_REQUEST['page'], so action will be done on curren page
        // also notice how we use $this->_args['singular'] so in this example it will
        // be something like &person=2
        if($item['status'] == 'Visible'){            
            $actions = array(
                // 'edit' => sprintf('<a href="?page=e_books_submenu&id=%s">%s</a>', $item['id'], __('Edit', 'nao_google_review')),
                'hide' => sprintf('<a href="?page=%s&action=hide&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Hide', 'nao_google_review')),
            );
        }else{
            $actions = array(
                // 'edit' => sprintf('<a href="?page=e_books_submenu&id=%s">%s</a>', $item['id'], __('Edit', 'nao_google_review')),
                'show' => sprintf('<a href="?page=%s&action=show&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Show', 'nao_google_review')),
            );
        }
        return sprintf('%s %s',
            $item['name'],
            $this->row_actions($actions)
        );
    }
    /**
     * [REQUIRED] this is how checkbox column renders
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }
    /**
     * [REQUIRED] This method return columns to display in table
     * you can skip columns that you do not want to show
     * like content, or description
     *
     * @return array
     */
    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'name' => __('Name', 'nao_google_review'),
            'location' => __('Location', 'nao_google_review'),
            'rating' => __('Rating', 'nao_google_review'),
            'review' => __('Review', 'nao_google_review'),
            'date' => __('Date', 'nao_google_review'),
            'status' => __('Status', 'nao_google_review'),
            
        );
        return $columns;
    }
    /**
     * [OPTIONAL] This method return columns that may be used to sort table
     * all strings in array - is column names
     * notice that true on name column means that its default sort
     *
     * @return array
     */
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'rating' => array('rating', true),
            'location' => array('location', true),
        );
        return $sortable_columns;
    }
    /**
     * [OPTIONAL] Return array of bult actions if has any
     *
     * @return array
     */
    function get_bulk_actions()
    {
        $actions = array(
            'hide' => 'Hide',
            'show' => 'Show'
        );
        return $actions;
    }
    /**
     * [OPTIONAL] This method processes bulk actions
     * it can be outside of class
     * it can not use wp_redirect coz there is output already
     * in this example we are processing hide action
     * message about successful deletion will be shown on page in next part
     */
    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'google_reviews'; // do not forget about tables prefix
        if ('hide' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);
            if (!empty($ids)) {
                $wpdb->query("UPDATE $table_name SET status=2 WHERE id IN($ids)");
            }
        }
        if ('show' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);
            if (!empty($ids)) {
                $wpdb->query("UPDATE $table_name SET status=1 WHERE id IN($ids)");
            }
        }
    }
	
	/**
	 * Add extra markup in the toolbars before or after the list
	 * @param string $which, helps you decide if you add the markup after (bottom) or before (top) the list
	 */
	protected function extra_tablenav( $which ) {

    }
    /**
     * [REQUIRED] This is the most important method
     *
     * It will get rows from database and prepare them to be showed in table
     */
    function prepare_items()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'google_reviews'; // do not forget about tables prefix
        $per_page = 20; // constant, how much records will be shown per page
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);
        // [OPTIONAL] process bulk action if any
        $this->process_bulk_action();
		$search = '';
			//Retrieve $customvar for use in query to get items.
			$customvar = ( isset($_REQUEST['customvar']) ? $_REQUEST['customvar'] : '');
			if($customvar != '') {
				$search_custom_vars= "AND action LIKE '%" . esc_sql( $wpdb->esc_like( $customvar ) ) . "%'";
			} else	{
				$search_custom_vars = '';
			}
			if ( ! empty( $_REQUEST['s'] ) ) {
				$search = "AND name LIKE '%" . esc_sql( $wpdb->esc_like( $_REQUEST['s'] ) ) . "%'";
		}
		
		$filter_search = '';
		
			if ( ! empty( $_REQUEST['filter_search'] ) ) {
				$filter_search = "AND name LIKE '%" . esc_sql( $wpdb->esc_like( $_REQUEST['filter_search'] ) ) . "%'";
		}
		
		
		
		
        // will be used in pagination settings
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");
        // prepare query params, as usual current page, order by and order direction
        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged'] - 1) * $per_page) : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';
        // [REQUIRED] define $items array
        // notice that last argument is ARRAY_A, so we will retrieve array
        $this->items = $wpdb->get_results( "SELECT owner as name,location,rating,review,date, created_date,IF(status=1,'Visible','Hidden') AS status, id  FROM $table_name WHERE 1=1 {$search}{$filter_search} {$search_custom_vars}" .$wpdb->prepare("ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
        // [REQUIRED] configure pagination
        $this->set_pagination_args(array(
            'total_items' => $total_items, // total items defined above
            'per_page' => $per_page, // per page constant defined at top of method
            'total_pages' => ceil($total_items / $per_page) // calculate pages count
        ));
    }
}