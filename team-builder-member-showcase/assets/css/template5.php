<style>

.team-member_<?php echo esc_attr( $tbms_post_id ); ?> {
	background-color: #fff;
	border-radius: 10px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	padding: 20px;
	text-align: center;
	margin: 10px 1%;
	transition: transform 0.3s;
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?>:hover {
	transform: translateY(-10px);
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?> img {
	border-radius: 50%;
    width: 120px !important;
    height: 120px;
    margin-bottom: 20px;
    display: inline-block !important;
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?> h3 {
	font-size: 24px;
	margin: 10px 0 5px;
	color: #333;
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?> p {
	color: #777;
	margin: 0 0 10px;
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?> .bio_<?php echo esc_attr( $tbms_post_id ); ?> {
	font-size: 14px;
	color: <?php echo $tbms_decription_color; ?>;
	margin: 15px 0;
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?> .social-icons_<?php echo esc_attr( $tbms_post_id ); ?> {
	display: flex;
	justify-content: center;
	list-style: none;
	padding: 0;
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?> .social-icons_<?php echo esc_attr( $tbms_post_id ); ?> li {
	margin: 0 10px;
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?> .social-icons_<?php echo esc_attr( $tbms_post_id ); ?> a {
	color: #333;
	font-size: 18px;
	text-decoration: none;
	transition: color 0.3s;
}
.team-member_<?php echo esc_attr( $tbms_post_id ); ?> .social-icons_<?php echo esc_attr( $tbms_post_id ); ?> a:hover {
	color: <?php echo $tbms_background_team_color; ?>;
}

</style>