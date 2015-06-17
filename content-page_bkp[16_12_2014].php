<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<!-- PRIMEIRA TELA - VIDEO -->
<?php 
	$postHome 			= get_post( 7 );
	$homeTitle			= $postHome->post_title;
	$contentHome		= apply_filters( 'the_content', $postHome->post_content );
	$post_thumbnail_id 	= get_post_thumbnail_id($postHome->ID);
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	//echo "<pre>"; print_r($postHome); echo "</pre>";
	wp_reset_query();
	if (!empty($postHome)) :
?>
<section id="inicio" class="home_int banner sTop" role="main">
	<div class="content content_home" style="background-image: url(<?php echo $post_thumbnail_url ?>);">
		<div class="container">
			<div class="play">
			</div>
			<div class="tit_home">
				<?php echo $contentHome; ?>
			</div>
			<div class="btn_scroll btn_home">
				<a href="#curso" title="Curso"></a>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- / PRIMEIRA TELA - VIDEO -->

<!-- SGUNDA TELA - CURSO -->
<?php 
	$postCurso 			= get_post( 12 );
	$cursoTitle			= $postCurso->post_title;
	$contentCurso		= apply_filters( 'the_content', $postCurso->post_content );
	$post_thumbnail_id 	= get_post_thumbnail_id($postCurso->ID);
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	$cursoIiconUm 		= get_post_meta( $postCurso->ID, 'item_curso_curso_online', true );
	$cursoIiconDois		= get_post_meta( $postCurso->ID, 'item_curso_aulas_teoricas', true );
	$cursoIiconTres		= get_post_meta( $postCurso->ID, 'item_curso_modulos', true );
	$cursoIiconQuatro	= get_post_meta( $postCurso->ID, 'item_curso_meses', true );
	$cursoIiconCinco	= get_post_meta( $postCurso->ID, 'item_curso_certificado', true );
	$cursoIiconSeis		= get_post_meta( $postCurso->ID, 'item_curso_grupo', true );
	$cursoIiconSete		= get_post_meta( $postCurso->ID, 'item_curso_conteudo', true );
	
	//echo "<pre>"; print_r($cursoIiconUm); echo "</pre>";
	wp_reset_query();
	if (!empty($postCurso)) :
?>
<section id="curso" class="curso_int s1" role="main">
	<div class="content content_curso" style="background-image: url(<?php echo $post_thumbnail_url ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-5 logo_produto"></div>
				<div class="col-md-7 infos">
					<?php echo $contentCurso; ?>
				</div>
				<ul class="col-md-12 icones_cursos">
					<?php if (!empty($cursoIiconUm)) { echo '<li>' .$cursoIiconUm. '</li>' ;} ?>
					<?php if (!empty($cursoIiconDois)) { echo '<li>' .$cursoIiconDois. '</li>' ;} ?>
					<?php if (!empty($cursoIiconTres)) { echo '<li>' .$cursoIiconTres. '</li>' ;} ?>
					<?php if (!empty($cursoIiconQuatro)) { echo '<li>' .$cursoIiconQuatro. '</li>' ;} ?>
					<?php if (!empty($cursoIiconCinco)) { echo '<li>' .$cursoIiconCinco. '</li>' ;} ?>
					<?php if (!empty($cursoIiconSeis)) { echo '<li>' .$cursoIiconSeis. '</li>' ;} ?>
					<?php if (!empty($cursoIiconSete)) { echo '<li>' .$cursoIiconSete. '</li>' ;} ?>
				</ul>
				<div class="btn_scroll btn_professor">
					<a href="#professor" title="Professor"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- / SGUNDA TELA - CURSO -->

<!-- TERCEIRA TELA - PROFESSOR -->
<?php 
	$postProfessor 			= get_post( 27 );
	$professorTitle			= $postProfessor->post_title;
	$contentProfessor		= apply_filters( 'the_content', $postProfessor->post_content );
	$post_thumbnail_id 		= get_post_thumbnail_id($postProfessor->ID);
	$post_thumbnail_url 	= wp_get_attachment_url( $post_thumbnail_id );
	$professorIconUm 		= get_post_meta( $postProfessor->ID, 'foto', true );
	$foto_professor_url 	= wp_get_attachment_url( $professorIconUm );
	$professorIconDois		= get_post_meta( $postProfessor->ID, 'timeline', true );
	$professorIconTres		= get_post_meta( $postProfessor->ID, 'descricao', true );
	$professorIconQuatro	= get_post_meta( $postProfessor->ID, 'facebook', true );
	$professorIconCinco		= get_post_meta( $postProfessor->ID, 'twitter', true );
	$professorIconSeis		= get_post_meta( $postProfessor->ID, 'linkdin', true );
	$professorIconSete		= get_post_meta( $postProfessor->ID, 'gplus', true );
	
	//echo "<pre>"; print_r($cursoIiconUm); echo "</pre>";
	wp_reset_query();
	if (!empty($postProfessor)) :
?>
<section id="professor" class="professor_int s2" role="main">
	<div class="content content_professor" style="background-image: url(<?php echo $post_thumbnail_url ?>);">
		<div class="container">
			<div class="row">
				<!-- TXT ESQUERDA -->
				<div class="col-md-3 infos">
					<?php echo $contentProfessor; ?>
				</div>
				<!-- COL CENTRO -->
				<div class="col-md-6 meio">
					<?php if (!empty($professorIconUm)) {
						echo '<div class="foto_professor"><img src="'.$foto_professor_url.'" /></div>'
					;} ?>
					
					<?php if (!empty($professorTitle)) {
						echo '<h1 class="title_professor">' .$professorTitle. '</h1>'
					;} ?>
					<?php if (!empty($professorIconTres)) {
						echo '<h4 class="desc_professor">' .$professorIconTres. '</h4>'
					;} ?>
					
					<div class="icones_media">
						<?php if (!empty($professorIconQuatro)) {
							echo '<a href="'.$professorIconQuatro.'" title="Facebook" target="_blank" class="face"></a>'
						;}
						if (!empty($professorIconCinco)) {
							echo '<a href="'.$professorIconCinco.'" title="Twitter" target="_blank" class="twitter"></a>'
						;}
						if (!empty($professorIconSeis)) {
							echo '<a href="'.$professorIconSeis.'" title="LinkdIn" target="_blank" class="linkedin"></a>'
						;}
						if (!empty($professorIconSete)) {
							echo '<a href="'.$professorIconSete.'" title="Google Plus" target="_blank" class="plus"></a>'
						;} ?>
					</div>
				</div>
				<!-- TXT DIREITA -->
				<div class="col-md-3 timeline">
					<?php if (!empty($professorIconDois)) { echo $professorIconDois ;} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- / TERCEIRA TELA - PROFESSOR -->

<!-- QUARTA TELA - DEPOIMENTOS -->
<?php
	$args = array(
		'numberposts' => -1,
		'post_type' => 'post',
		'cat' => '3'
	);
	$the_query 				= new WP_Query( $args );
	$descCategory 			= category_description(3);
	wp_reset_query();
	if( $the_query->have_posts() ):
?>
<section id="depoimentos" class="depoimentos_int s3" role="main">
	<div class="content_depoimentos" style="background-image: url(<?php echo $post_thumbnail_url ?>);">
		<div class="container">
			<div class="row">
				<h1><?php echo $descCategory ;?></h1>
				<!-- MONTA O CAROUSEL DOS DEPOIMENTOS -->
				<div class="carousel">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="int_carousel">
						<div class="col-md-7 txt_depoimento"><?php the_content(); ?></div>
						<div class="col-md-5 img_tit_depoimento">
							<?php
								$depoimentoFotoID 	= get_post_thumbnail_id( $post_id );
								$depoimentoFoto	 	= wp_get_attachment_url( $depoimentoFotoID );
								$depoimentoInfo		= get_post_meta( get_the_ID(), 'dempoimento_info', true );
								//FOTO DEPOIMENTO
								echo '<div class="img_depoimento"><img src="'.$depoimentoFoto.'" alt="'.get_the_title().'">','</div>';
								//TÍTULO DEPOIMENTO
								the_title('<h4 class="tit_depoimento">','</h4>');
								//INFO DEPOIMENTO
								if (!empty($depoimentoInfo)) {
									echo '<p>'.$depoimentoInfo.'</p>';
								};
							?>
						</div>
					</div>
				<?php endwhile; ?>
				</div>
				<!-- FECHA O CAROUSEL DOS DEPOIMENTOS -->
				<div class="btn_scroll btn_porque_matricular">
					<a href="#porque_matricular" title="Porque se matricular"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / QUARTA TELA - DEPOIMENTOS -->

<!-- QUINTA TELA - PQ MATRICULAR - SEÇÃO 1 -->
<?php
	$bgPorqueMatricular 			 = get_post( 44 );
	$post_thumbnail_id_pqMatricular  = get_post_thumbnail_id($bgPorqueMatricular->ID);
	$post_thumbnail_url_pqMatricular = wp_get_attachment_url( $post_thumbnail_id_pqMatricular );

	$args = array(
		'numberposts' => 2,
		'post_type' => 'post',
		'cat' => '5'
	);
	$queryPorqueQuem 		= new WP_Query( $args );
	wp_reset_query();
	if( $queryPorqueQuem->have_posts() ):
?>
<section id="porque_matricular" class="porque_matricular_int s4" role="main">
	<div class="content content_porque_matricular" style="background-image: url(<?php echo $post_thumbnail_url_pqMatricular ?>);">
		<div class="container">
			<div class="row">
				<?php
					while ( $queryPorqueQuem->have_posts() ) : $queryPorqueQuem->the_post();
					$iconPorqueQuemID  	= get_post_thumbnail_id( $post_id );
					$iconPorqueQuem 	= wp_get_attachment_url( $iconPorqueQuemID );
				?>
					<div class="col-md-6">
						<div class="col-md-4">
							<?php echo '<div class="img_pqquem"><img src="'.$iconPorqueQuem.'" alt="'.get_the_title().'">','</div>'; ?>
						</div>
						<div class="col-md-8 txt_pqQuem">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
				<div class="btn_scroll btn_porque_matricular_1">
					<a href="#porque_matricular_1" title="Segredos da manipulação"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / QUINTA TELA - PQ MATRICULAR - SEÇÃO 1 -->

<!-- SEXTA TELA - PQ MATRICULAR - SEÇÃO 2 -->
<?php
	$txtPorqueMatricularS2 	= get_post( 60 );
	$txtS2					= apply_filters( 'the_content', $txtPorqueMatricularS2->post_content );
	$args = array(
		'numberposts' => 4,
		'post_type' => 'post',
		'cat' => '6'
	);
	$querySegredos 		= new WP_Query( $args );
	wp_reset_query();
	if( $querySegredos->have_posts() ):
?>
<section id="porque_matricular_1" class="porque_matricular_segredos_int s5" role="main">
	<div class="content content_porque_matricular" style="background-image: url(<?php echo $post_thumbnail_url_pqMatricular ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-3 descricao_segredos">
					<?php echo $txtS2 ; ?>
				</div>
				<div class="col-md-9 itens_segredos">
					<?php
						while ( $querySegredos->have_posts() ) : $querySegredos->the_post();
						$iconSegredosID  = get_post_thumbnail_id( $post_id );
						$iconSegredos 	 = wp_get_attachment_url( $iconSegredosID );
					?>
						<div class="col-md-6 item_segredo">
							<div class="col-md-3">
								<?php echo '<div class="img_segredos"><img src="'.$iconSegredos.'" alt="'.get_the_title().'">','</div>'; ?>
							</div>
							<div class="col-md-9 txt_segredos">
								<?php
									the_title('<h1>','</h1>');
									the_content();
								?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<div class="btn_scroll btn_porque_matricular_1">
					<a href="#porque_matricular_2" title="Segredos da manipulação"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / SEXTA TELA - PQ MATRICULAR - SEÇÃO 2 -->

<!-- SÉTIMA TELA - PQ MATRICULAR - SEÇÃO 3 -->
<?php
	$args = array(
		'numberposts' => 1,
		'post_type' => 'post',
		'cat' => '7'
	);
	$queryBeneficios 		= new WP_Query( $args );
	wp_reset_query();
	if( $queryBeneficios->have_posts() ):
?>
<section id="porque_matricular_2" class="porque_matricular_beneficios_int s5" role="main">
	<div class="content content_porque_matricular" style="background-image: url(<?php echo $post_thumbnail_url_pqMatricular ?>);">
		<div class="container">
			<div class="row">
				<?php while ( $queryBeneficios->have_posts() ) : $queryBeneficios->the_post(); ?>
					<?php echo get_the_content(); ?>
				<?php endwhile; ?>
				<div class="btn_scroll btn_porque_matricular_1">
					<a href="#modulos" title="Módulos"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / SÉTIMA TELA - PQ MATRICULAR - SEÇÃO 3 -->

<!-- OITAVA TELA VIDEOS -->
<?php
	$modulosPost 	= get_post( 75 );
	$txtModulos	 	= apply_filters( 'the_content', $modulosPost->post_content );
	$bgModulosID  	= get_post_thumbnail_id( $modulosPost->ID );
	$bgModulos 	 	= wp_get_attachment_url( $bgModulosID );
	$args = array(
		'numberposts' => 9,
		'post_type' => 'post',
		'cat' => '8'
	);
	$queryModulos 	= new WP_Query( $args );
	wp_reset_query();
	if( $queryModulos->have_posts() ):
?>
<section id="modulos" class="modulos_int s6" role="main">
	<div class="content content_modulos" style="background-image: url(<?php echo $bgModulos ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 desc_post_modulos">
					<?php echo $txtModulos ;?>
				</div>
				<ul class="col-md-12 itens_modulos">
					<?php
						while ( $queryModulos->have_posts() ) : $queryModulos->the_post();
						$modulosID  = get_post_thumbnail_id( $post_id );
						$modulos 	= wp_get_attachment_url( $modulosID );
					?>

						<li class="col-md-4">
							<span style="background-image: url(<?php echo $modulos ?>)">
								<?php
									the_content();
									the_title('<h3>','</h3>');
								?>
							</span>
						</li>
					<?php endwhile; ?>
				</ul>
				<div class="btn_scroll btn_vantagens">
					<a href="#vantagens" title="Vantagens ao Aluno"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / OITAVA TELA VIDEOS -->

<!-- NONA TELA VANTAGENS -->
<?php
	$modulosPost 		= get_post( 85 );
	$titleVantangens	= $modulosPost->post_title;
	$bgVantagensID  	= get_post_thumbnail_id( $modulosPost->ID );
	$bgModulos 	 		= wp_get_attachment_url( $bgVantagensID );
	$args = array(
		'numberposts' => -1,
		'post_type' => 'post',
		'cat' => '9'
	);
	$queryVantagens 	= new WP_Query( $args );
	wp_reset_query();
	if( $queryVantagens->have_posts() ):
?>
<section id="vantagens" class="vantagens_int s6" role="main">
	<div class="content content_vantagens" style="background-image: url(<?php echo $bgModulos ?>);">
		<div class="container">
			<div class="row">
				<h1 class="col-md-12 desc_vantagens"><?php echo $titleVantangens ;?></h1>
				<ul class="col-md-12 itens_vantagens">
					<?php while ( $queryVantagens->have_posts() ) : $queryVantagens->the_post(); ?>
						<li class="col-md-4">
							<?php
								the_title('<h2>','</h2>');
								the_content();
							?>
						</li>
					<?php endwhile; ?>
				</ul>
				<div class="btn_scroll btn_porque_matricular_1">
					<a href="#inscreva" title="Inscreva-se"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / NONA TELA VANTAGENS -->

<!-- DÉCIMA TELA INSCREVA-SE -->
<?php
	$inscrevaPost 		= get_post( 105 );
	$titleInscreva		= $inscrevaPost->post_title;
	$txtInscreva	 	= apply_filters( 'the_content', $inscrevaPost->post_content );
	$bgInscrevaID  		= get_post_thumbnail_id( $inscrevaPost->ID );
	$bgInscreva	 		= wp_get_attachment_url( $bgInscrevaID );
	$inscrevaEsquerda	= get_post_meta( $inscrevaPost->ID, 'txt_inscreva_esquerda', true );
	$inscrevaDireita	= get_post_meta( $inscrevaPost->ID, 'txt_inscreva_direita', true );
	if( !empty( $inscrevaPost ) ):
?>
<section id="inscreva" class="inscreva_int s7" role="main">
	<div class="content content_inscreva" style="background-image: url(<?php echo $bgInscreva ?>);">
		<div class="container">
			<div class="row">
				<h1 class="col-md-12 desc_inscreva"><?php echo $titleInscreva ;?></h1>
				<div class="col-md-12 itens_inscreva">
					<div class="col-md-3">
						<?php if (!empty($inscrevaEsquerda)) { echo $inscrevaEsquerda ; } ?>
					</div>
					<div class="col-md-6">
						<?php echo $txtInscreva ;?>
					</div>
					<div class="col-md-3">
						<?php if (!empty($inscrevaDireita)) { echo $inscrevaDireita ; } ?>
					</div>
				</div>
				<div class="btn_scroll btn_porque_matricular_1">
					<a href="#inscreva_1" title="Não perca essa oportunidade!"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / DÉCIMA TELA INSCREVA-SE -->

<!-- DÉCIMA PRIMEIRA TELA INSCREVA-SE - OPORTUNIDADE -->
<?php
	$inscreva_1_Post 	= get_post( 120 );
	$txtInscreva_1_Post	= apply_filters( 'the_content', $inscreva_1_Post->post_content );
	$inscreva_1_PostID  = get_post_thumbnail_id( $inscreva_1_Post->ID );
	$inscreva_1_Post	= wp_get_attachment_url( $inscreva_1_PostID );
	$args = array(
		'numberposts' => -1,
		'post_type' => 'post',
		'cat' => '10'
	);
	$queryInscreva_1 	= new WP_Query( $args );
	wp_reset_query();
	if( $queryInscreva_1->have_posts() ):
?>
<section id="inscreva_1" class="inscreva_1_int s7" role="main">
	<div class="content content_inscreva_1" style="background-image: url(<?php echo $inscreva_1_Post ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 desc_inscreva_1"><?php echo $txtInscreva_1_Post ;?></div>
				<ul class="col-md-12 itens_inscreva_1">
					<?php while ( $queryInscreva_1->have_posts() ) : $queryInscreva_1->the_post(); ?>
						<li class="col-md-6">
							<?php
								the_title('<h2>','</h2>');
								the_content();
							?>
						</li>
					<?php endwhile; ?>
				</ul>
				<div class="btn_scroll btn_porque_matricular_1">
					<a href="#depoimento" title="Veja o que algumas pessoas dizem"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / DÉCIMA PRIMEIRA TELA INSCREVA-SE - OPORTUNIDADE -->

<!-- REPETE QUARTA TELA - DEPOIMENTOS -->
<?php
	if( $the_query->have_posts() ):
?>
<section id="depoimento" class="depoimentos_int s3" role="main">
	<div class="content_depoimentos" style="background-image: url(<?php echo $post_thumbnail_url ?>);">
		<div class="container">
			<div class="row">
				<h1><?php echo $descCategory ;?></h1>
				<!-- MONTA O CAROUSEL DOS DEPOIMENTOS -->
				<div class="carousel">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="int_carousel">
						<div class="col-md-7 txt_depoimento"><?php the_content(); ?></div>
						<div class="col-md-5 img_tit_depoimento">
							<?php
								$depoimentoFotoID 	= get_post_thumbnail_id( $post_id );
								$depoimentoFoto	 	= wp_get_attachment_url( $depoimentoFotoID );
								$depoimentoInfo		= get_post_meta( get_the_ID(), 'dempoimento_info', true );
								//FOTO DEPOIMENTO
								echo '<div class="img_depoimento"><img src="'.$depoimentoFoto.'" alt="'.get_the_title().'">','</div>';
								//TÍTULO DEPOIMENTO
								the_title('<h4 class="tit_depoimento">','</h4>');
								//INFO DEPOIMENTO
								if (!empty($depoimentoInfo)) {
									echo '<p>'.$depoimentoInfo.'</p>';
								};
							?>
						</div>
					</div>
				<?php endwhile; ?>
				</div>
				<!-- FECHA O CAROUSEL DOS DEPOIMENTOS -->
				<div class="btn_scroll btn_porque_matricular">
					<a href="#contato" title="Inscreva-se"></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / REPETE QUARTA TELA - DEPOIMENTOS -->

<!-- REPETE DÉCIMA TELA INSCREVA-SE -->
<?php
	$inscrevaTxtFinal1	= get_post_meta( $inscrevaPost->ID, 'txt_inscreva_final_1', true );
	$inscrevaTxtFinal2	= get_post_meta( $inscrevaPost->ID, 'txt_inscreva_final_2', true );
	if( !empty( $inscrevaPost ) ):
?>
<section id="contato" class="inscreva_int s7" role="main">
	<div class="content content_inscreva" style="background-image: url(<?php echo $bgInscreva ?>);">
		<div class="container">
			<div class="row">
				<h1 class="col-md-12 desc_inscreva"><?php echo $titleInscreva ;?></h1>
				<div class="col-md-12 itens_inscreva">
					<div class="col-md-3">
						<?php if (!empty($inscrevaEsquerda)) { echo $inscrevaEsquerda ; } ?>
					</div>
					<div class="col-md-6">
						<?php echo $txtInscreva ;?>
					</div>
					<div class="col-md-3">
						<?php if (!empty($inscrevaDireita)) { echo $inscrevaDireita ; } ?>
					</div>
					<span class="txt_final_inscreva col-md-12">
						<?php if (!empty($inscrevaTxtFinal1)) { echo $inscrevaTxtFinal1 ; } ?>
					</span>
					<span class="txt_final_inscreva col-md-12">
						<?php if (!empty($inscrevaTxtFinal2)) { echo $inscrevaTxtFinal2 ; } ?>
					</span>
				</div>
				<footer class="col-md-12">
					<div class="logo_footer">
						<a href="#inicio" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">							
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>
					</div>
					<div class="social_footer">
						
					</div>
				</footer>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
?>
<!-- / REPETE DÉCIMA TELA INSCREVA-SE -->