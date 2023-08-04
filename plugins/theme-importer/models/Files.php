<?php

/**
 * Class for handling file uploads
 */
class Files
{
    /**
     * Upload a file to the server and attach it to a post
     *
     * @param string $file The file to be uploaded, containing the url
     * @param int $post_id The ID of the post to attach the file to
     *
     * @return int The attachment ID if the file was uploaded successfully, 0 otherwise
     */
    public static function upload($file, $post_id)
    {
        include_once(ABSPATH . 'wp-admin/includes/admin.php');
        $fileUploaded = array();
        $explodedUrlFile = explode('/', explode('?', $file)[0]);
        $fileUploaded['name'] = wp_basename(array_pop($explodedUrlFile));
        $existingAttachment = self::getExistingAttachmentByFileName($fileUploaded['name']);
        if (!empty($existingAttachment)) {
            return $existingAttachment->ID;
        }
        $fileUploaded['tmp_name'] = \download_url($file);
        if (!is_wp_error($fileUploaded['tmp_name'])) {
            $attachmentId = media_handle_sideload($fileUploaded, $post_id);
            return $attachmentId;
        }
        return 0;
    }

    /**
     * Get an existing attachment by its filename
     *
     * @param string $filename The filename of the attachment
     *
     * @return WP_Post|null The attachment if it exists, null otherwise
     */
    private static function getExistingAttachmentByFileName($filename)
    {
        $existingAttachment = null;
        $args = [
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'posts_per_page' => 1,
            'fields' => 'ids',
            'meta_query' => [
                [
                    'value' => $filename,
                    'compare' => 'LIKE',
                    'key' => '_wp_attached_file'
                ]
            ]
        ];
        $attachmentQuery = new \WP_Query($args);
        if ($attachmentQuery->have_posts()) {
            $attachmentId = $attachmentQuery->posts[0];
            $existingAttachment = get_post($attachmentId);
        }
        return $existingAttachment;
    }
}
