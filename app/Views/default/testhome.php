<?php $this->layout('layout', ['title' => 'testhome']) ?>

<?php $this->start('main_content') ?>

	
	<?php var_dump($lastStudentsForView); ?>

<?php foreach($lastStudentsForView as $etudiant): ?>

  <li>
    <a href="#">
        <img src="<?= $this->assetUrl("img/photos/" . $etudiant['photo'] . "") ?>">
         <?= $etudiant['prenom'] ?>
         <?= $etudiant['nom'] ?> 
        <?=$etudiant['matiere'] ?>
         <?= $etudiant['ville'] ?>
        

                         
    </a>
  </li>
<?php endforeach; ?>+



<?php $this->stop('main_content') ?>
