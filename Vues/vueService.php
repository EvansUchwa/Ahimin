<?php 
	$this->_pageTitle = 'Service';
	$this->_pageStyles = 'modal_slick_slick-theme_elementDetail_dashForm';
	$this->_pageScripts = 'User/view_slick.min_slicker_modal_User/react_User/comment';

	// var_dump($service);
 ?>
 <div class="modal" id="elementAction" >
    <div class="evaBody">
        <div class="modalHeader">
            <i class="mdi mdi-close closer"></i>
        </div>

        <div class="evaResult"></div>

    </div>
</div>

<div class="pageContent">
	<div class="elementDetails" element-id="<?= $element->getId() ?>" element-type='service'>
		<div class="reactBtn">
			<?php if($userLoved == 1){ ?>
				<label class="reactLove userLoved" element-type="service"
					id="<?= $element->getId() ?>" 
					data-id="<?=  $elementAutor->getId() ?>">
				<span class="mdi mdi-heart"></span>
				</label>
			<?php }else{ ?>
				<label class="reactLove userNotLoved" element-type="service"
				id="<?= $element->getId() ?>" 
				data-id="<?=  $elementAutor->getId() ?>">
				<span class="mdi mdi-heart-outline"></span>
				</label>
			<?php } ?>
			
		</div>
	<div class="pdImgSlide">
		<div class="pdisGiant">
			<div class="pdisgImg">
				<img src="<?= $element->getPhoto1() ?>" alt="<?= $element->getTitre() ?> Pic 1">
			</div>
			<div class="pdisgImg">
				<img src="<?= $element->getPhoto2() ?>" alt="<?= $element->getTitre() ?> Pic 2">
			</div>
			<div class="pdisgImg">
				<img src="<?= $element->getPhoto3() ?>" alt="<?= $element->getTitre() ?> Pic 3">
			</div>
			<div class="pdisgImg">
				<img src="<?= $element->getPhoto4() ?>" alt="<?= $element->getTitre() ?> Pic 4">
			</div>
		</div>

		<div class="pdisSmall">
			<div class="pdissImg">
				<img src="<?= $element->getPhoto1() ?>" alt="<?= $element->getTitre() ?> Pic 1">
			</div>
			<div class="pdissImg">
				<img src="<?= $element->getPhoto2() ?>" alt="<?= $element->getTitre() ?> Pic 2">
			</div>
			<div class="pdissImg">
				<img src="<?= $element->getPhoto3() ?>" alt="<?= $element->getTitre() ?> Pic 3">
			</div>
			<div class="pdissImg">
				<img src="<?= $element->getPhoto4() ?>" alt="<?= $element->getTitre() ?> Pic 4">
			</div>
		</div>
		
	</div>

	<div class="pdTextInfos">
		<div class="pdtiNamesLocationType">
			<div class="elementPosterName" data-id="<?= $element->getUserId() ?>">
				<a href="Profil-<?= $element->getUserId() ?>">Par <?= $elementAutor->getPseudo() ?></a>
			</div>
			<div class="elementName">
				<h1><?= $element->getTitre() ?></h1>
				<span><?= $element->getStatut() ?></span>
			</div>
			<div class="elementPrice">
				 <h2>Horaire:</h2>
				  <span><?= $element->getOpenHour() ?> a <?= $element->getCloseHour() ?></span>
			</div>
			<div class="elementReact">
					<div>
						<i class="mdi mdi-heart-outline"></i>
						 <h3 id="nbPersonneLoved">
						 	<?= $element->getLoves(); ?>
						 </h3>
					</div>

					<div>
						<i class="mdi mdi-eye-outline"></i>
						 <h3 id="nbPersonneLoved">
						 	<?= $element->getViews(); ?>
						 </h3>
					</div>
			</div>
			<div class="elementLocation">
				<i class="mdi mdi-map-marker"></i>
				<h2><?= $element->getLocalisation() ?></h2>
			</div>
			<div class="elementDescription">
				<h4>Description:</h4>
				<p><?= $element->getDescription() ?></p>
			</div>
			<div class="elementCategorie">
				<h5>Categorie</h5>
				<i class="mdi mdi-arrow-right"></i>
				<a href=""><?= $element->getCategorie() ?></a>
			</div>
			<div class="elementSubCategorie">
				<h5>Sous-categorie</h5>
				<i class="mdi mdi-arrow-right"></i>
				<a href=""><?= $element->getsubCategorie() ?></a>
			</div>

<!-- an -->
			<!-- <a href="">Stock/Unique</a> -->
		</div>
	</div>
</div>


	<div class="commentForm">
		<form id="addElementComment" method="post" 
		data-id="<?= $element->getId() ?>" >
			<label>Laisser un commentaire</label>
			<textarea name="comment" id="commentField"></textarea>
			<?php if(isset($_SESSION) && !empty($_SESSION['id'] )){ ?>
				<button type="submit">Commenter</button>
			<?php }else{ ?>
				<button type="button" class="notConnected">Commenter</button>
			<?php } ?>
			
		</form>
	</div>

	<div class="replyCommentForm">
		<form id="addElementCommentReply" method="post" 
		data-id="<?= $element->getId() ?>" >
			<label><span>Repondre a : </span>
			"<p class="replyText"></p>" </label>
			<textarea name="replyContent" id="replyCommentField"></textarea>
			<div class="rcfBtn">
				<button class="closercForm">Annuler</button>
				<?php if(isset($_SESSION) && !empty($_SESSION['id'])){ ?>
					<button type="submit">Repondre</button>
				<?php }else{ ?>
					<button type="button" class="notConnected">Commenter</button>
				<?php } ?>
			</div>
		</form>
	</div>

	<div class="commentList">
		<div class="commentListTitle">
			<h3>Ce que quelques utilisateur en pense...</h3>
		</div>
		<ul class="comments">
			<?php foreach ($elementComments as $elementComment) { ?>
			<li class="comment">
                <div class="commentInfo">
                    <div class="commentImgUserAndDate">
                    	<img src="<?=$elementComment->getPhoto() ?>" alt="<?= $elementComment->getPseudo() ?> Pic">
                    	<div>
	                        <a href=""><?= $elementComment->getPseudo() ?></a>
	                        <i class="mdi mdi-clock"></i>
	                        <span><?= $elementComment->convertedDate() ?></span>
	                    </div>
                    </div>
                    <div class="commentContent">    
    					<p id="cmt-<?=$elementComment->getId() ?>"><?=$elementComment->getContent() ?></p>
                    </div>

                </div>

                <div class="commentAction">
                    <label class="replyCommentBtn" data-id="<?=$elementComment->getId() ?>">
                    Repondre</label>
                    <label class="viewReplysBtn" data-id="<?=$elementComment->getId() ?>">
                    	Voir les reponses
                    </label>

                    <?php if(isset($_SESSION) && !empty($_SESSION['id'])
                    	&& $elementComment->getAutorId() == $userConnected->getId()){  ?>
                    	<label class="deleteCommentBtn" data-id="<?=$elementComment->getId() ?>"
                    			label-action="delete" label-type='comments'>
                   	 	Supprimer</label>
                   	 	<label class="updateCommentBtn" data-id="<?=$elementComment->getId() ?>"
                   	 			label-action="update" label-type='comments'>
                   	 	Modifier</label>
                    <?php }else{  ?>
                    	<label class="notConnected">
                   	 	Supprimer</label>
                   	 	<label class="notConnected">
                   	 	Modifier</label>
                    <?php } ?>
                    <ul class="replyComments" id="rcm-<?=$elementComment->getId() ?>">
                    	
                    </ul>
                </div>
            </li>
			<?php } ?>
		</ul>
	</div>
</div>
