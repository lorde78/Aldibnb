<?php
class Caracteristiques{

    private $description;
    private $prix;
    private $surface;
    private $nombre_de_chambres;
    private $nombreDePersonne;

    public function __construct($metakey){
        $this->metakey = $metakey;
        $this->description = $metakey . '_description';
        $this->prix = $metakey . '_prix';
        $this->surface = $metakey . '_surface';
        $this->nombre_de_chambres = $metakey . '_nombredechambres';
        $this->nombreDePersonne = $metakey . '_nombreDePersonne';
        $this->register();
    }

    public function register() {
        add_action('add_meta_boxes', [$this, 'MonTheme_add_metabox']);
        add_action('save_post', [$this, 'MonTheme_save_metabox']);
    }

    public function MonTheme_add_metabox(){
        add_meta_box(
            'caracteristiques',
            'Les caracteristiques du logement',
            [$this, 'MonTheme_metabox_render'],
            'logement',
            'side'
        );
    }

    public function  MonTheme_metabox_render($post){

        $description = get_post_meta($post->ID, $this->description, true) ? : null;
        $prix = get_post_meta($post->ID, $this->prix, true) ? : null;
        $surface = get_post_meta($post->ID, $this->surface, true) ? : null;
        $nombre_de_chambres = get_post_meta($post->ID, $this->nombre_de_chambres, true) ? : null;
        $nombreDePersonne = get_post_meta($post->ID, $this->nombreDePersonne, true) ? : null;
        ?>
        
        <label for="description">La déscription du logement</label>
        <input type="text" name="<?= $this->description; ?>" id="description" value="<?= $description; ?>"><br/>

        <label for="prix">Le prix du logement</label>
        <input type="number" name="<?= $this->prix; ?>" id="prix" value="<?= $prix; ?>"><br/>

        
        <label for="surface">La surface du logement</label>
        <input type="number" name="<?= $this->surface; ?>" id="surface" value="<?= $surface; ?>"><br/>
        
        <label for="nombredechambres">Le nombre de chambres</label>
        <input type="number" name="<?= $this->nombre_de_chambres; ?>" id="nombredechambres" value="<?= $nombre_de_chambres; ?>">

        <label for="nombreDePersonne">Nombre de Personne</label>
        <input type="number" name="<?= $this->nombreDePersonne; ?>" id="nombreDePersonne" value="<?= $nombreDePersonne; ?>">
        <?php
    }

    public function MonTheme_save_metabox($post_id){
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

        if(isset($_POST[$this->nombreDePersonne])) {
            update_post_meta($post_id, $this->nombreDePersonne , $_POST[$this->nombreDePersonne]);
        } else {
            delete_post_meta($post_id, $this->nombreDePersonne);
        }
    }

}