<?php

namespace App\Models;

use Core\Database;

class Post {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $sql = 
            "SELECT *
            FROM posts 
            ORDER BY created_at DESC";

        $this->db->query($sql);

        $results = $this->db->resultSet();

        return $results;
    }

    public function insert($post)
    {
        $sql = "INSERT INTO posts(title, body) VALUES(:title, :body)";
        $this->db->query($sql);
        $this->db->bind('title', $post['title']);
        $this->db->bind('body', $post['body']);

        // Execute the prepared statement
        if ($this->db->execute()) {
            return true;
        }
        // If something goes wrong
        return false;
    }

    public function getPost($id)
    {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind('id', $id);

        $post = $this->db->single();
        
        return $post? $post : false;
    }

    public function update($post)
    {
        $sql = "UPDATE posts SET title = :title, body = :body WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind('title', $post['title']);
        $this->db->bind('body', $post['body']);
        $this->db->bind('id', $post['post_id']);

        // Execute the prepared statement
        if ($this->db->execute()) {
            return true;
        }
        // If something goes wrong
        return false;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind('id', $id);

        if ($this->db->execute()) {
            return true;
        }
        // If something goes wrong
        return false;
    }

}