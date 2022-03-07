<?php
class SponsoBox{

    private $metakey;
    private $description;
    private $prix;

    public function __construct($metakey){
        $this->metakey = $metakey;
        $this->description = $metakey . '_description';
        $this->prix = $metakey . '_prix';
        $this->register();
    }

    public function register() {
        add_action('add_meta_boxes', [$this, 'aldibnb_add_metabox']);
        add_action('save_post', [$this, 'aldibnb_save_metabox']);
    }

    public function aldibnb_add_metabox(){
        add_meta_box(
            'prix',
            'Le prix du logement',
            [$this, 'aldibnb_metabox_render'],
            'logements',
            'side'
        );
    }

    public function  aldibnb_metabox_render($post){

        $description = get_post_meta($post->ID, $this->description, true) ? : null;
        $prix = get_post_meta($post->ID, $this->prix, true) ? : null;
        ?>
        <input type="text" name="<?= $this->description; ?>" id="description" value="<?= $description; ?>">
        <label for="description">La déscription du logement</label>

        <input type="text" name="<?= $this->prix; ?>" id="prix" value="<?= $prix; ?>">
        <label for="prix">Le prix du logement</label>
        <?php
    }

    public function aldibnb_save_metabox($post_id){
        if(isset($_POST[$this->description])) {
            update_post_meta($post_id, $this->description , $_POST[$this->description]);
        } else {
            delete_post_meta($post_id, $this->description);
        }
        
        if(isset($_POST[$this->prix])) {
            update_post_meta($post_id, $this->prix , $_POST[$this->prix]);
        } else {
            delete_post_meta($post_id, $this->prix);
        }
    }

}