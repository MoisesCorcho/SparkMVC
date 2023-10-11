<?php

namespace App\Models;

use Core\Database;

class Post {

    private $db;

    /**
     * Constructor method to initialize the Database object.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get all posts from the database.
     *
     * @return array|bool An array of post objects on success, or false on failure.
     */
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

    /**
     * Insert a new post into the database.
     *
     * @param array $post An associative array containing 'title' and 'body' of the post.
     * @return bool True on success, false on failure.
     */
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

    /**
     * Get a specific post by its ID.
     *
     * @param int $id The ID of the post to retrieve.
     * @return object|bool An object representing the post on success, or false if not found.
     */
    public function getPost($id)
    {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind('id', $id);

        $post = $this->db->single();
        
        return $post? $post : false;
    }

    /**
     * Update an existing post in the database.
     *
     * @param array $post An associative array containing 'title', 'body', and 'post_id'.
     * @return bool True on success, false on failure.
     */
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

    /**
     * Delete a post from the database by its ID.
     *
     * @param int $id The ID of the post to delete.
     * @return bool True on success, false on failure.
     */
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