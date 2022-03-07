<?php
class Caracteristiques{

    private $metakey;
    private $description;
    private $prix;
    private $surface;
    private $nombre_de_chambres;

    public function __construct($metakey){
        $this->metakey = $metakey;
        $this->description = $metakey . '_description';
        $this->prix = $metakey . '_prix';
        $this->surface = $metakey . '_surface';
        $this->nombre_de_chambres = $metakey . '_nombredechambres';
        $this->register();
    }

    public function register() {
        add_action('add_meta_boxes', [$this, 'aldibnb_add_metabox']);
        add_action('save_post', [$this, 'aldibnb_save_metabox']);
    }

    public function aldibnb_add_metabox(){
        add_meta_box(
            'caracteristiques',
            'Les caracteristiques du logement',
            [$this, 'aldibnb_metabox_render'],
            'logements',
            'side'
        );
    }

    public function  aldibnb_metabox_render($post){

        $description = get_post_meta($post->ID, $this->description, true) ? : null;
        $prix = get_post_meta($post->ID, $this->prix, true) ? : null;
        $surface = get_post_meta($post->ID, $this->surface, true) ? : null;
        $nombre_de_chambres = get_post_meta($post->ID, $this->nombre_de_chambres, true) ? : null;
        ?>
        
        <label for="description">La déscription du logement</label>
        <input type="text" name="<?= $this->description; ?>" id="description" value="<?= $description; ?>"><br/>

        <label for="prix">Le prix du logement</label>
        <input type="number" name="<?= $this->prix; ?>" id="prix" value="<?= $prix; ?>"><br/>

        
        <label for="surface">La surface du logement</label>
        <input type="number" name="<?= $this->surface; ?>" id="surface" value="<?= $surface; ?>"><br/>
        
        <label for="nombredechambres">Le prix du logement</label>
        <input type="text" name="<?= $this->nombre_de_chambres; ?>" id="nombredechambres" value="<?= $nombre_de_chambres; ?>">
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

        if(isset($_POST[$this->surface])) {
            update_post_meta($post_id, $this->surface , $_POST[$this->surface]);
        } else {
            delete_post_meta($post_id, $this->surface);
        }

        if(isset($_POST[$this->nombre_de_chambres])) {
            update_post_meta($post_id, $this->nombre_de_chambres , $_POST[$this->nombre_de_chambres]);
        } else {
            delete_post_meta($post_id, $this->nombre_de_chambres);
        }
    }

}