<?php
class PostsController
{
    static function import($posts): void
    {
        try {
            foreach ($posts as $post) {
                $postId = self::getPostOrCreate($post);
                $fields = new Fields($postId);
                $fields->updateFields($post['fields']);
            }
            new Alerts('Páginas cadastradas com sucesso');
        } catch (\Exception $e) {
            new Alerts('Ocorreu um erro ao cadastrar as páginas: ' . $e->getMessage(), 'error');
        }
    }

    static function getPostOrCreate($post)
    {
        $title = $post['name'];
        $type = isset($post['type']) ? $post['type'] : 'page';
        $options = isset($post['options']) ? $post['options'] : [];

        $args = array(
            'post_type' => $type,
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'fields' => 'ids', // Apenas recupera os IDs das páginas
            'title' => $title,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $post_id = $query->posts[0]; // Recupera o ID da primeira página encontrada
            return $post_id;
        } else {
            return wp_insert_post(array_merge([
                'post_type' => $type,
                'post_title' => $title,
                'post_status' => 'publish',
                'post_content' => '',
                'post_author' => get_current_user_id(),
            ], $options));
        }
    }
}
