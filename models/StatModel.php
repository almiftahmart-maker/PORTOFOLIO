<?php
class StatModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function addPageView() {
        if (!isset($_SESSION['has_visited'])) {
            $this->db->query("UPDATE page_views SET total_views = total_views + 1 WHERE page_name = 'home'");
            $_SESSION['has_visited'] = true;
        }
    }

    public function getTotalViews() {
        $result = $this->db->query("SELECT total_views FROM page_views WHERE page_name = 'home'");
        return ($result->num_rows > 0) ? $result->fetch_assoc()['total_views'] : 0;
    }
}
?>