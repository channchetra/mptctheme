<?php
/*--------------------------------------------------------------------------------------
    *
    * bs_container
    *
    * @author Robin Wouters
    * @since 3.0.3.3
    *
    *-------------------------------------------------------------------------------------*/
function bs_container( $atts, $content = null ) {

    $atts = shortcode_atts( array(
            "fluid"  => false,
            "xclass" => false,
            "data"   => false
    ), $atts );

    $class  = ( $atts['fluid']   == 'true' )  ? 'container-fluid' : 'container';
    $class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

    $data_props = $this->parse_data_attributes( $atts['data'] );

    return sprintf(
        '<div class="%s"%s>%s</div>',
        esc_attr( trim($class) ),
        ( $data_props ) ? ' ' . $data_props : '',
        do_shortcode( $content )
    );
}


/*--------------------------------------------------------------------------------------
    *
    * bs_container_fluid
    *
    * @author Robin Wouters
    * @since 3.0.3.3
    *
    *-------------------------------------------------------------------------------------*/
function bs_container_fluid( $atts, $content = null ) {

    $atts = shortcode_atts( array(
            "xclass" => false,
            "data"   => false
    ), $atts );

    $class  = 'container-fluid';
    $class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

    $data_props = $this->parse_data_attributes( $atts['data'] );

    return sprintf(
        '<div class="%s"%s>%s</div>',
        esc_attr( trim($class) ),
        ( $data_props ) ? ' ' . $data_props : '',
        do_shortcode( $content )
    );
}
/*--------------------------------------------------------------------------------------
    *
    * bs_row
    *
    * @author Filip Stefansson
    * @since 1.0
    *
    *-------------------------------------------------------------------------------------*/
function bs_row( $atts, $content = null ) {

    $atts = shortcode_atts( array(
            "xclass" => false,
            "data"   => false
    ), $atts );

    $class  = 'row';
    $class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

    $data_props = $this->parse_data_attributes( $atts['data'] );

    return sprintf(
        '<div class="%s"%s>%s</div>',
        esc_attr( trim($class) ),
        ( $data_props ) ? ' ' . $data_props : '',
        do_shortcode( $content )
    );
}

    /*--------------------------------------------------------------------------------------
        *
        * bs_column
        *
        * @author Simon Yeldon
        * @since 1.0
        * @todo pull and offset
        *-------------------------------------------------------------------------------------*/
function bs_column( $atts, $content = null ) {

    $atts = shortcode_atts( array(
            "lg"          => false,
            "md"          => false,
            "sm"          => false,
            "xs"          => false,
            "offset_lg"   => false,
            "offset_md"   => false,
            "offset_sm"   => false,
            "offset_xs"   => false,
            "pull_lg"     => false,
            "pull_md"     => false,
            "pull_sm"     => false,
            "pull_xs"     => false,
            "push_lg"     => false,
            "push_md"     => false,
            "push_sm"     => false,
            "push_xs"     => false,
            "xclass"      => false,
            "data"        => false
    ), $atts );

    $class  = '';
    $class .= ( $atts['lg'] )			                                ? ' col-lg-' . $atts['lg'] : '';
    $class .= ( $atts['md'] )                                           ? ' col-md-' . $atts['md'] : '';
    $class .= ( $atts['sm'] )                                           ? ' col-sm-' . $atts['sm'] : '';
    $class .= ( $atts['xs'] )                                           ? ' col-xs-' . $atts['xs'] : '';
    $class .= ( $atts['offset_lg'] || $atts['offset_lg'] === "0" )      ? ' col-lg-offset-' . $atts['offset_lg'] : '';
    $class .= ( $atts['offset_md'] || $atts['offset_md'] === "0" )      ? ' col-md-offset-' . $atts['offset_md'] : '';
    $class .= ( $atts['offset_sm'] || $atts['offset_sm'] === "0" )      ? ' col-sm-offset-' . $atts['offset_sm'] : '';
    $class .= ( $atts['offset_xs'] || $atts['offset_xs'] === "0" )      ? ' col-xs-offset-' . $atts['offset_xs'] : '';
    $class .= ( $atts['pull_lg']   || $atts['pull_lg'] === "0" )        ? ' col-lg-pull-' . $atts['pull_lg'] : '';
    $class .= ( $atts['pull_md']   || $atts['pull_md'] === "0" )        ? ' col-md-pull-' . $atts['pull_md'] : '';
    $class .= ( $atts['pull_sm']   || $atts['pull_sm'] === "0" )        ? ' col-sm-pull-' . $atts['pull_sm'] : '';
    $class .= ( $atts['pull_xs']   || $atts['pull_xs'] === "0" )        ? ' col-xs-pull-' . $atts['pull_xs'] : '';
    $class .= ( $atts['push_lg']   || $atts['push_lg'] === "0" )        ? ' col-lg-push-' . $atts['push_lg'] : '';
    $class .= ( $atts['push_md']   || $atts['push_md'] === "0" )        ? ' col-md-push-' . $atts['push_md'] : '';
    $class .= ( $atts['push_sm']   || $atts['push_sm'] === "0" )        ? ' col-sm-push-' . $atts['push_sm'] : '';
    $class .= ( $atts['push_xs']   || $atts['push_xs'] === "0" )        ? ' col-xs-push-' . $atts['push_xs'] : '';
    $class .= ( $atts['xclass'] )                                       ? ' ' . $atts['xclass'] : '';

    $data_props = $this->parse_data_attributes( $atts['data'] );

    return sprintf(
        '<div class="%s"%s>%s</div>',
        esc_attr( trim($class) ),
        ( $data_props ) ? ' ' . $data_props : '',
        do_shortcode( $content )
    );
}
