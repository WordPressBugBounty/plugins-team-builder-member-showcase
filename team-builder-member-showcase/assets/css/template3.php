<style>
/* Team block */

.team-block_<?php echo esc_attr( $tbms_post_id ); ?> h3 {
  font-size: 20px;
  padding-top: 13px;
  margin-bottom: 2px;
  font-weight: 600;
  color: #031117;
}
.team-block_<?php echo esc_attr( $tbms_post_id ); ?> img {
  min-width: 100%;
}
.team-block_<?php echo esc_attr( $tbms_post_id ); ?> .team-three-content {
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
	padding: 1px;
}
.team-block_<?php echo esc_attr( $tbms_post_id ); ?> p {
  color: <?php echo esc_html( $tbms_decription_color ); ?>;
}
.content-center_<?php echo esc_attr( $tbms_post_id ); ?> {
  text-align: center;
  margin: 10px 1px;
}
.team-block_<?php echo esc_attr( $tbms_post_id ); ?> em {
  color: <?php echo esc_html( $tbms_background_team_color ); ?>;
  display: block;
  margin-bottom: 12px;
}
.tb-socio_<?php echo esc_attr( $tbms_post_id ); ?> {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: center;
}
.tb-socio_<?php echo esc_attr( $tbms_post_id ); ?> a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 33px;
  height: 33px;
  color: #b3bdc6;
  border-radius: 50% !important;
  border: solid 1px #d5d5d5;
  font-size: 16px;
  margin: 0 7px;
  transition: all 0.3s ease;
  text-decoration: none;
  vertical-align: middle;
}
.tb-socio_<?php echo esc_attr( $tbms_post_id ); ?> a svg {
  width: 1em;
  height: 1em;
}
.tb-socio_<?php echo esc_attr( $tbms_post_id ); ?> a:hover {
  color: <?php echo esc_html( $tbms_background_team_color ); ?> !important;
  border: solid 1px <?php echo esc_html( $tbms_background_team_color ); ?>;
}
</style>
