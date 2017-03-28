<form action="<?php echo home_url(); ?>/" method="get" id="searchform">
    <fieldset>
        <input class="input" name="s" type="text" id="keywords" value="<?php _e('to search, type and hit enter','redcodn') ?>" onfocus="if (this.value == '<?php _e('to search, type and hit enter','redcodn') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('to search, type and hit enter','redcodn') ?>';}">
        <input type="submit" class="button" value="<?php _e('Search','redcodn') ?>">
	</fieldset>
</form>