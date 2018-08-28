<?php
return [

	/*
	|--------------------------------------------------------------------------
	| Message for all type of operation on system
	|--------------------------------------------------------------------------
	*/
	'admin-user' => [
		'invalid-credentials' => 'Veuillez entrer un e-mail et mot de passe valides.',
		'success-login' => 'Vous êtes connecté avec succès.',
		'success-logout' => 'Vous êtes déconnecté avec succès.',
		'add-success' => 'L\'utilisateur administrateur a été ajouté avec succès.', 
		'add-error' => 'L\'utilisateur administrateur n\'a pas été ajouté avec succès.', 
		'update-success' => 'L\'utilisateur administrateur a été mis à jour avec succès.',
		'update-error' => 'L\'utilisateur administrateur n\'a pas été mis à jour avec succès.',
		'delete-success' => 'L\'utilisateur administrateur a été supprimé avec succès.',
		'password-success' => 'Le mot de passe de l\'utilisateur administrateur a été modifié avec succès.',
		'password-error' => 'Le mot de passe de l\'utilisateur administrateur n\'a pas été modifié avec succès.', 
	],
	'reset-password' => [
		'invalid-credentials' => "Désolé, cette adresse e-mail n\'est pas enregistrée avec ce mot? Alors il n\'y a pas de mot de passe à récupérer.",  
		'success-mail' => 'Le lien de réinitialisation du mot de passe est envoyé à votre adresse e-mail.',
		'password-set' => 'Mot de passe réinitialisé avec succès.',
		'reset-password-error' => 'Votre e-mail est invalide.',
		'reset-password-error-length' => 'Les mots de passe doivent comporter au moins six caractères et correspondre à la confirmation.',
		'token' => 'Ce jeton de réinitialisation de mot de passe n\'est pas valide.',
		'inactive-user' => 'Your account is de-activated.',
	],
	'product' => [
		'add-success' => 'Produit ajouté avec succès.',
		'add-error' => 'Produit non ajouté avec succès.',
		'update-success' => 'Produit mis à jour avec succès.',
		'update-error' => 'Produit non mis à jour avec succès.',
		'delete-success' => 'Produit supprimé avec succès.',
		'delete-error' => 'Produit non supprimé avec succès.',
		'create-watermark-images' => 'Images de filigrane créées avec succès.', 
		'create-watermark-thumb-images' => 'Vignettes de filigrane créées avec succès.', 
		'create-thumb-images' => 'Thumb images créées avec succès.', 
	],
	'orders' => [
		'add-success' => 'État de commande mis à jour avec succès.',
	],
	'image' => [
		'add-success' => 'Image ajouté avec succès.',
		'image-required' => 'Veuillez sélectionner une image.',
	],
	'configuration' => [
		'add-success' => 'configuration ajoutée avec succès.',
	],
	'notice' => [
		'pricing' => 'Le fichier CSV doit contenir le nombre de lettres, le prix d\'image, le prix sans cadre et les lettres seulement. Et n\'incluez jamais "$" avec Price. ',
		'shipping-tax' => 'Le fichier CSV doit contenir l\'identifiant d\'état et le taux de taxe. Et n\'incluez jamais "%" avec le taux d\'imposition. ',
		'product-images' => 'Le fichier CSV doit contenir l\'alphabet, le code du produit et le nom de l\'image. ',
		'Frame' => 'Le fichier CSV doit contenir la lettre, le type de cadre, la taille encadrée, la grille encadrée. ',
		'shipping-cost' => 'Le fichier CSV doit contenir l\'identifiant du cadre, le nombre de cadres, l\'identifiant de la méthode d\'expédition, le taux de livraison, l\'identifiant de l\'état. Et ne jamais inclure "$" avec le taux de livraison. ',
		'delivery-time' => 'Le fichier CSV doit contenir l\'ID du cadre, le nombre d\'images, l\'ID de la méthode d\'expédition, le délai de livraison minimal, le délai de livraison maximum et l\'ID d\'état. ',
	],
	'brand' => [
		'add-success' => 'Marque ajoutée avec succès.',
		'add-error' => 'Veuillez sélectionner une lettre ou une image de l\'alphabet.',
		'update-success' => 'Marque mise à jour avec succès.',
		'update-error' => 'Marque non mise à jour avec succès.',
		'delete-success' => 'Marque supprimée avec succès.',
		'delete-error' => 'Marque non supprimée avec succès.',
	],
	'pack' => [
		'add-success' => 'Pack ajoutée avec succès.',
		'update-success' => 'Pack mise à jour avec succès.',
		'update-error' => 'Pack non mise à jour avec succès.',
		'delete-success' => 'Pack supprimée avec succès.',
		'delete-error' => 'Pack non supprimée avec succès.',
	],
	'promotion' => [
		'add-success' => 'Promotion ajoutée avec succès.',
		'add-error' => 'Quelque chose s\'est mal passé, merci de réessayer plus tard!',
		'update-success' => 'Promotion mise à jour avec succès.',
		'update-error' => 'Promotion non mise à jour avec succès.',
		'delete-success' => 'Promotion supprimée avec succès.',
		'delete-error' => 'Promotion non supprimée avec succès.',
	],
	'coupon-code' => [
		'add-success' => 'Code de coupon ajouté avec succès.',
		'add-error' => 'Quelque chose s\'est mal passé, merci de réessayer plus tard!',
		'update-success' => 'Le code de coupon a bien été mis à jour.',
		'update-error' => 'Le code de coupon n\'a pas été mis à jour avec succès.',
		'delete-success' => 'Le code de coupon a bien été supprimé.',
		'delete-error' => 'Le code de coupon n\'a pas été supprimé avec succès.',
	],
	'user' => [
		'invalid-credentials' => 'Veuillez entrer un e-mail et un mot de passe valides.',
		'success-login' => 'Vous êtes connecté avec succès.',
		'success-register' => 'Vous êtes enregistré avec succès. Vérifiez votre e-mail pour confirmer votre enregistrement.',
		'error-register' => 'Hmm, on dirait que vous êtes déjà client de notre site. Veuillez réessayer de vous connecter ou demandez un nouveau mot de passe.',
		'success-logout' => 'Vous êtes déconnecté avec succès.',
		'password-success' => 'Votre mot de passe a bien été modifié.',
		'password-error' => 'Votre mot de passe n\'a pas été modifié avec succès.',
	],
	'account' => [
		'password-success' => 'Votre mot de passe a bien été modifié.',
		'password-error' => 'Votre ancien mot de passe est incorrect.',
		'account-success' => 'Vos informations ont bien été  mises à jour.',
		'account-error' => 'Vos informations n\'ont pas été mises à jour avec succès.',
		'delete-success' => 'Votre adresse a bien été supprimée.',

	],
	'contact' => [
		'contact-success' => "Votre message a bien été envoyé.",
		'contact-error' => "Votre message n'a pas été envoyé avec succès.",
	],
	'attribute' => [
		'add-success' => 'Attribut ajouté avec succès.',
		'add-error' => 'Attribut non ajouté avec succès.',
		'update-success' => 'Attribut mis à jour avec succès.',
		'update-error' => 'Attribut non mis à jour avec succès.',
		'delete-success' => 'Attribut supprimé avec succès.',
		'delete-error' => 'Attribut non supprimé avec succès.',
	],
	'attribute-set' => [
		'add-success' => 'Attribut Set ajouté avec succès.',
		'add-error' => 'Attribut Set non ajouté avec succès.',
		'update-success' => 'Attribut Set mis à jour avec succès.',
		'update-error' => 'Attribut Set non mis à jour avec succès.',
		'delete-success' => 'Attribut Set supprimé avec succès.',
		'delete-error' => 'Attribut Set non supprimé avec succès.',
	],
	'category' => [
		'add-success' => 'Catégorie ajoutée avec succès.',
		'add-error' => 'Catégorie non ajoutée avec succès.',
		'update-success' => 'Catégorie mise à jour avec succès.',
		'update-error' => 'Catégorie non mise à jour avec succès.',
		'delete-success' => 'Catégorie supprimée avec succès.',
		'delete-error' => 'Catégorie non supprimée avec succès.',
	],
	'role' => [
		'add-success' => 'Rôle ajouté avec succès.',
		'add-error' => 'Rôle non ajouté avec succès.',
		'update-success' => 'Role mis à jour avec succès.',
		'update-error' => 'Rôle non mis à jour avec succès.',
		'delete-success' => 'Rôle supprimé avec succès.',
		'delete-error' => 'Rôle non supprimé avec succès.',
	],
	'page' => [
		'add-success' => 'Page ajoutée avec succès.',
		'add-error' => 'La page n\'a pas été ajoutée avec succès.',
		'update-success' => 'Page mise à jour avec succès.',
		'update-error' => 'Page non mise à jour avec succès.',
		'delete-success' => 'Page supprimée avec succès.',
		'delete-error' => 'Page non supprimée avec succès.',
	],
	'admin' => [
		'add-success' => 'Utilisateur administrateur ajouté avec succès.',
		'add-error' => 'Utilisateur administrateur non ajouté avec succès.',
		'update-success' => 'Utilisateur administrateur mis à jour avec succès.',
		'update-error' => 'Utilisateur administrateur non mis à jour avec succès.',
		'delete-success' => 'L\'administrateur a été supprimé avec succès.',
		'delete-error' => 'L\'administrateur n\'est pas supprimé avec succès.',
	],
	'email-template' => [
		'add-success' => 'Modèle d\'e-mail ajouté avec succès.',
		'add-error' => 'Modèle d\'e-mail non ajouté avec succès.',
		'update-success' => 'Modèle d\'email mis à jour avec succès.',
		'update-error' => 'Modèle d\'email non mis à jour avec succès.',
		'delete-success' => 'Modèle d\'e-mail supprimé avec succès.',
		'delete-error' => 'Modèle d\'email non supprimé avec succès.',
	],
	'banner' => [
		'add-success' => 'Bannière ajoutée avec succès.',
		'add-error' => 'Bannière non ajoutée avec succès.',
		'update-success' => 'Bannière mise à jour avec succès.',
		'update-error' => 'Bannière non mise à jour avec succès.',
		'delete-success' => 'Bannière supprimée avec succès.',
		'delete-error' => 'Bannière non supprimée avec succès.',
	],
	'slider' => [
		'add-success-slider' => 'Slider ajouté avec succès.',
		'add-error-slider' => 'Le curseur n\'a pas été ajouté avec succès.',
		'update-success-slider' => 'Slider mis à jour avec succès.',
		'update-error-slider' => 'Le curseur n\'a pas été mis à jour avec succès.',
		'delete-success-slider' => 'Slider supprimé avec succès.',
		'delete-error-slider' => 'Le curseur n\'a pas été supprimé avec succès.',
	],
	'rating' => [
		'update-success' => 'Évaluation mise à jour avec succès.',
		'update-error' => 'Évaluation non mise à jour avec succès.',
		'delete-success' => 'Évaluation supprimée avec succès.',
		'delete-error' => 'Évaluation non supprimée avec succès.',
	],
	'order-status' => [
		'add-success' => 'État de la commande ajouté avec succès.',
		'add-error' => 'L\'état de la commande n\'a pas été ajouté avec succès.',
		'update-success' => 'Statut de commande mis à jour avec succès.',
		'update-error' => 'État de la commande non mis à jour avec succès.',
		'delete-success' => 'État de la commande supprimé avec succès.',
		'delete-error' => 'État de la commande non supprimé avec succès.',
	],
	'store' => [
		'add-success' => 'Magasin ajouté avec succès.',
		'add-error' => 'Magasin non ajouté avec succès.',
		'update-success' => 'Magasin mis à jour avec succès.',
		'update-error' => 'Magasin non mis à jour avec succès.',
		'delete-success' => 'Magasin supprimé avec succès.',
		'delete-error' => 'Magasin non supprimé avec succès.',
	],
    'link_adjustment' => [
        'add-success' => 'Lien ajouté avec succès.',
        'add-error' => 'Lien non ajouté avec succès.',
        'update-success' => 'Lien mis à jour avec succès.',
        'update-error' => 'Lien non mis à jour avec succès.',
        'delete-success' => 'Lien supprimé avec succès.',
        'delete-error' => 'Lien non supprimé avec succès.',
    ],
    'special-product' => [
        'add-success' => 'Produit spécial ajouté avec succès.',
        'add-error' => 'Produit spécial non ajouté avec succès.',
        'update-success' => 'Produit spécial mis à jour avec succès.',
        'update-error' => 'Produit spécial non mis à jour avec succès.',
        'delete-success' => 'Produit spécial supprimé avec succès.',
        'delete-error' => 'Produit spécial non supprimé avec succès.',
    ],
	'blog-category'=>[
		'add-success' => 'Catégorie de blog ajoutée avec succès.',
		'add-error' => 'Catégorie de blog non ajoutée avec succès.',
		'update-success' => 'Catégorie de blog mise à jour avec succès.',
		'update-error' => 'Catégorie de blog non mise à jour avec succès.',
		'delete-success' => 'Catégorie de blog supprimée avec succès.',
		'delete-error' => 'Catégorie de blog non supprimée avec succès.',
	],
	'blog-post'=>[
		'add-success' => 'Message de blog ajouté avec succès.',
		'add-error' => 'Message de blog non ajouté avec succès.',
		'update-success' => 'Message de blog mis à jour avec succès.',
		'update-error' => 'Message de blog non mis à jour avec succès.',
		'delete-success' => 'Message de blog supprimé avec succès.',
		'delete-error' => 'Message de blog non supprimé avec succès.',
	],
	'order'=>[
		'delete-success'=>"Commande supprimée avec succès.",
		'update-success'=>"État de la commande mis à jour."
	],
	'faq'=>[
		'add-success' => 'FAQ ajoutée avec succès.',
		'add-error' => 'FAQ non ajoutée avec succès.',
		'update-success' => 'FAQ mise à jour avec succès.',
		'update-error' => 'FAQ non mise à jour avec succès.',
		'delete-success' => 'FAQ supprimée avec succès.',
		'delete-error' => 'FAQ non supprimée avec succès.',
	],
	'radio'=>[
		'add-success' => 'Radio ajoutée avec succès.',
		'add-error' => 'Radio non ajoutée avec succès.',
		'update-success' => 'Radio mise à jour avec succès.',
		'update-error' => 'Radio non mise à jour avec succès.',
		'delete-success' => 'Radio supprimée avec succès.',
		'delete-error' => 'Radio non supprimée avec succès.',
	],
	'epartner'=>[
		'add-success' => 'Epartner Media ajouté avec succès.',
		'add-error' => 'Epartner Media non ajouté avec succès.',
		'update-success' => 'Epartner Media mis à jour avec succès.',
		'update-error' => 'Epartner Media non mis à jour avec succès.',
		'delete-success' => 'Epartner Media supprimé avec succès.',
		'delete-error' => 'Epartner Media non supprimé avec succès.',
	],
	'invoice'=>[
		'add-success' => 'Facture ajoutée avec succès.',
		'add-error' => 'Facture non ajoutée avec succès.',
		'update-success' => 'Facture mise à jour avec succès.',
		'update-error' => 'Facture non mise à jour avec succès.',
		'delete-success' => 'Facture supprimée avec succès.',
		'delete-error' => 'Facture non supprimée avec succès.',
	],
	'code_promo' => [
		'add-success' => 'Code promo ajouté avec succès.',
		'add-error' => 'Code promo non ajouté avec succès.',
		'update-success' => 'Code promo mise à jour avec succès.',
		'update-error' => 'Code promo non mise à jour avec succès.',
		'delete-success' => 'Code promo supprimé avec succès.',
		'delete-error' => 'Code promo non supprimé avec succès.',
	],
	'customer' => [
		'add-success' => 'Client enregistré avec succès.',
		'add-error' => 'Echec lors de l\'enregistrement du client.',
		'update-success' => 'Modification du client effectuée avec succès.',
		'update-error' => 'Echec de la modification du client.',
		'delete-success' => 'Client supprimé avec succès.',
		'delete-error' => 'Echec lors de la suppression du client.',
	],
	'instagram' => [
		'add-success' => 'Instagram Feed ajouté avec succès, veillez verifier l\' ordre si c\'est activé.',
		'add-error' => 'Echec lors de l\'enregistrement de votre Instagram Feed.',
		'update-success' => 'Modification de votre Instagram Feed effectuée avec succès.',
		'update-error' => 'Echec de la modificationde votre Instagram Feed.',
		'delete-success' => 'Instagram Feed supprimé avec succès.',
		'delete-error' => 'Echec lors de la suppression de votre Instagram Feed.',
		'order-success' => 'Votre ordre est enregistré avec succés.',
	],

];

