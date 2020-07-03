/**
 Javascript to handle Codemirror editor
 Event 'cf7sg-form-change' fired on #contact-form-editor element when codemirror changes occur
 @since 3.1.2 introduce instaiated cm editor as attribute in anonymous function.
*/
(function( $, cme ) {

  $(document).ready( function(){
    var $codemirror = $('#cf7-codemirror');
    var $wpcf7Editor = $('textarea#wpcf7-form-hidden');
    var codemirrorUpdated = false;
    var $grid = $('#grid-form');
    var gridTab = '#cf7-editor-grid'; //default at load time.
    //set codemirror editor value;
    cme.setValue($wpcf7Editor.text());

    $wpcf7Editor.on('grid-ready', function(){ //------ setup the codemirror editor
      //codemirror editor
      CodeMirror.defineMode("shortcode", function(config, parserConfig) {
        var cf7Overlay = {
          token: function(stream, state) {
            var ch;
            if (stream.match(/^\[([a-zA-Z0-9_]+)\*?\s?/)) {
              while ((ch = stream.next()) != null)
                if (ch == "]" ) {
                  //stream.eat("]");
                  return "shortcode";
                }
            }
            while (stream.next() != null && !stream.match(/^\[([a-zA-Z0-9_]+)\*?\s?/, false)) {}
            return null;
          }
        };
        return CodeMirror.overlayMode(CodeMirror.getMode(config, parserConfig.backdrop || "htmlmixed"), cf7Overlay);
      });
      // var cmConfig =
      if(cf7sgeditor.mode.length>0) cme.setOption('mode',cf7sgeditor.mode);
      if(cf7sgeditor.theme.length>0) cme.setOption('theme',cf7sgeditor.theme);
      // cmEditor = CodeMirror( $codemirror.get(0), cmConfig);

      /*  TODO: enable shortcode edit at a future date
      $('.cm-shortcode',$codemirror).each(function(){
        $(this).append('<span class="dashicons dashicons-edit"></span>');
      });
      $('.dashicons-edit', $codemirror).on('click', function(){
        alert('shortcode '+ $(this).parent().text());
      });
      */
      $.fn.beautify = function(cursor){
        cme.setSelection({
          'line':cme.firstLine(),
          'ch':0,
          'sticky':null
        },{
          'line':cme.lastLine(),
          'ch':0,
          'sticky':null
        },
        {scroll: false});
        cme.indentSelection("smart");
        cme.setCursor(cme.firstLine(),0);
        if('undefined' != typeof cursor && cursor.find(false)){
          var from = cursor.from();
          var to = cursor.to();
          cme.setSelection(CodeMirror.Pos(from.line, 0), to);
          cme.scrollIntoView({from: from, to: CodeMirror.Pos(to.line + 10, 0)});
        }
      }
      $codemirror.beautify();

      //var cur = cme.getCursor();
      //cme.setCursor(99, cur.ch);

      cme.on('changes', function(){
        codemirrorUpdated = true;
        var disabled = $('#form-editor-tabs').tabs('option','disabled');

        if(true===disabled){
          var changes = $('<div>').append(cme.getValue());
          if(0===changes.children().length || changes.children('.container').length>0){
            $('#form-editor-tabs').tabs('option',{disabled:false});
            /**
            * @since 1.2.3 disable cf7sg styling/js for non-cf7sg forms.
            */
            $('#is-cf7sg-form').val('true');
          }
        }

        $('#contact-form-editor').trigger('cf7sg-form-change');
      });

      //create tabs
      $('#form-editor-tabs').tabs({
        beforeActivate: function (event, ui){
          //update the codemirror panel
          if('#cf7-codemirror' == ui.newPanel.selector){
						//finalise any changes in the grid form editor
            $grid.on('cf7grid-form-ready', function(){
                var code = $grid.CF7FormHTML();
                if($grid.children('.container').length > 0){ //beautify.
	              code = html_beautify(code ,
    	              {
    	                'indent_size': 2,
    	                'wrap_line_length': 0
    	              });
                }
	            cme.setValue(code);
	            //reset the codemirror change flag
	            codemirrorUpdated = false;
	            //remove id from textarea
	            $('textarea#wpcf7-form').attr('id', '');
	            //change the wpcf7 textarea
	            $('textarea.codemirror-cf7-update', $codemirror).attr('id', 'wpcf7-form');
	            //setup the form code in the hidden textarea
	            $wpcf7Editor.html(code);
						});
            /** @since 2.8.3 clear the codemirror textarea##wpcf7-form */
            $('textarea.codemirror-cf7-update', $codemirror).val('');
						$grid.trigger('cf7grid-form-finalise');
          }else{
            //remove id from textarea
            $('textarea#wpcf7-form').attr('id', '');
          }
        },
        activate: function( event, ui ) {
          gridTab = ui.newPanel.selector;
          if('#cf7-editor-grid' == ui.newPanel.selector){
            if(codemirrorUpdated){
              //update the hidden textarea
              $wpcf7Editor.text(cme.getValue());
              //trigger rebuild grid event
              $grid.trigger('build-grid');
            }else{ //try to set the focus on the 'cf7sgfocus element'
              var $focus = $('.cf7sgfocus', $grid);
              if($focus.length>0){
                var scrollPos = $focus.offset().top - $(window).height()/2 + $focus.height()/2;
                //console.log(scrollPos);
                $(window).scrollTop(scrollPos);
                $focus.removeClass('cf7sgfocus');
              }
            }
          }else if('#cf7-codemirror' == ui.newPanel.selector){
            var cursor = cme.getSearchCursor('cf7sgfocus', CodeMirror.Pos(cme.firstLine(), 0), {caseFold: true, multiline: true});

            $codemirror.beautify(cursor);

            if($grid.children('.container').length>0){
              var scrollPos = $('#form-panel').offset().top;
              $(window).scrollTop(scrollPos);
            }
          }
        }
      });
      /*@since 1.1.1 disable grid editor for existing cf7 forms*/
      if(0==$grid.children('.container').length){
        $('#form-editor-tabs').tabs('option',{ active:1, disabled:true});
        /**
        * @since 1.2.3 disable cf7sg styling/js for non-cf7sg forms.
        */
        $('#is-cf7sg-form').val('false');
      }

      //update the codemirror when tags are inserted
      $('form.tag-generator-panel .button.insert-tag').on('click', function(){
        var $textarea = $('textarea#wpcf7-form');
        if($textarea.is('.codemirror-cf7-update')){
          var tag = $textarea.delay(100).val();
          cme.replaceSelection(tag);
          //update codemirror.
          $textarea.val(''); //clear.
        }
      });
    }); //-----------end codemirror editor setup

    $('form#post').submit(function(event) {
      var $this = $(this);
      $( window ).off( 'beforeunload' ); //remove event to stop cf7 script from warning on save
      event.preventDefault(); //this will prevent the default submit
      var $embdedForms = '';
      var $formNoEmbeds = '';
      var codeMirror ='';
      if('#cf7-editor-grid' == gridTab){ //set up the code in the cf7 textarea
        var $txta = $('textarea#wpcf7-form');
        $txta.html($txta.val()+'\n');
        codeMirror = html_beautify(
          $grid.CF7FormHTML(),
          {
            'indent_size': 2,
            'wrap_line_length': 0
          }
        );
        $('textarea#wpcf7-form-hidden').html(codeMirror);
        $formNoEmbeds = $('<div>').append(codeMirror);
      }else{//we are in text mode.
        codeMirror = cme.getValue();
        $('textarea#wpcf7-form-hidden').html(codeMirror).val(codeMirror);
        $formNoEmbeds = $('<div>').append(codeMirror);
      }
      //since 1.8 remove cf7sgfocus class if present.
      $('.cf7sgfocus', $formNoEmbeds).removeClass('cf7sgfocus');
      $embdedForms = $formNoEmbeds.find('.cf7sg-external-form').remove();
      //setup sub-forms hidden field.
      var embeds = [];
      var hasTables = false, hasTabs = false, hasToggles=false;
      if($embdedForms.length>0){
        $embdedForms.each(function(){
          embeds[embeds.length] = $(this).data('form');
        });
      }
      $('#cf7sg-embeded-forms').val(JSON.stringify(embeds));
      var cf7TagRegexp = /\[(.[^\s]*)\s*(.[^\s]*)(|\s*(.[^\[]*))\]/img;
      /** @since 3.0.0 determine scripts required */
      var scriptClass ="";
      if(codeMirror.indexOf("class:sgv-")>0) scriptClass += "has-validation,";
      if(codeMirror.indexOf("class:select2")>0) scriptClass += "has-select2,";
      if(codeMirror.indexOf("class:nice-select")>0) scriptClass += "has-nice-select,";
      if($('.cf7sg-collapsible', $formNoEmbeds).length>0) scriptClass += "has-accordion,";
      if(codeMirror.indexOf("[benchmark")>0) scriptClass += "has-benchmark,";
      if(codeMirror.indexOf("[date")>0 || 0<codeMirror.search(/\[text([^\]]+?)class:datepicker/ig)) scriptClass += "has-date,";

      //scan and submit tabs & tables fields.
      var tableFields = [];
      $('.row.cf7-sg-table', $formNoEmbeds).each(function(){
        /**@since 2.4.2 track each tables with unique ids and their fields*/
        var unique = $(this).closest('.container.cf7-sg-table').attr('id');
        var fields = {};
        fields[unique]=[];
        var search = $(this).html();
        var match = cf7TagRegexp.exec(search);
        //console.log('search:'+search);
        while (match != null) {
          //ttFields[ match[2] ] = match[1];
          fields[unique][fields[unique].length] = match[2];
          //console.log('match'+match[2]);
          match = cf7TagRegexp.exec(search); //get the next match.
        }
        tableFields[tableFields.length] = fields;
        hasTables = true;
      });
      //var cf7TagRegexp = /\[(.[^\s]*)\s*(.[^\s]*)\s*(.[^\[]*)\]/img;
      var tabFields = [];
      $('.container.cf7-sg-tabs-panel', $formNoEmbeds).each(function(){
        /**@since 2.4.2 track each tables with unique ids and their fields*/
        var unique = $(this).attr('id');
        var fields = {};
        fields[unique]=[];
        var search = $(this).html();
        var match = cf7TagRegexp.exec(search);
        while (match != null) {
          //if( -1 === tableFields.indexOf(match[2]) ) /*removed as now want to idenify fields which are both tabs and table fields*/
          fields[unique][fields[unique].length] = match[2];
          //ttFields[match[2]] = match[1];
          match = cf7TagRegexp.exec(search); //get the next match.
        }
        tabFields[tabFields.length] = fields;
        hasTabs = true;
      });
      /**
      * Track toggled fields to see if they are submitted or not.
      * @since 2.5 */

      var toggledFields = [];
      $('.container.cf7sg-collapsible.with-toggle', $formNoEmbeds).each(function(){
        /**@since 2.4.2 track each tables with unique ids and their fields*/
        var unique = $(this).attr('id');
        var fields = {};
        fields[unique]=[];
        var search = $(this).html();
        var match = cf7TagRegexp.exec(search);
        while (match != null) {
          //if( -1 === tableFields.indexOf(match[2]) ) /*removed as now want to idenify fields which are both tabs and table fields*/
          fields[unique][fields[unique].length] = match[2];
          //ttFields[match[2]] = match[1];
          match = cf7TagRegexp.exec(search); //get the next match.
        }
        toggledFields[toggledFields.length] = fields;
        hasToggles = true;
      });
      //append hidden fields
      $this.append('<input type="hidden" name="cf7sg-has-tabs" value="'+hasTabs+'" /> ');
      $this.append('<input type="hidden" name="cf7sg-has-tables" value="'+hasTables+'" /> ');
      $this.append('<input type="hidden" name="cf7sg-has-toggles" value="'+hasToggles+'" /> ');
      var disabled = $('#form-editor-tabs').tabs('option','disabled');
      $this.append('<input type="hidden" name="cf7sg-has-grid" value="'+disabled+'" /> ');
      //update script classes since v3.
      if(hasTabs) scriptClass+="has-tabs,";
      if(hasTables) scriptClass+="has-table,";
      if(hasToggles) scriptClass+="has-toggles,";
      if(!disabled) scriptClass+="has-grid,";
      $this.append('<input type="hidden" name="cf7sg-script-classes" value="'+scriptClass+'" />');

      $('#cf7sg-tabs-fields').val(JSON.stringify(tabFields));
      $('#cf7sg-table-fields').val(JSON.stringify(tableFields));
      $('#cf7sg-toggle-fields').val(JSON.stringify(toggledFields));

      //alert(ttFields);
      // continue the submit unbind preventDefault.
      $this.unbind('submit').submit();
   });
   /*
   Function to convert the UI form into its html final form for editing in the codemirror and/or saving to the CF7 plugin.
   */
    $.fn.CF7FormHTML = function(){
      var $this = $(this);
      if( !$this.is('#grid-form') ){
        return '';
      }
      var $form = $('<div>').append(  $this.html() );
      var text='';
      //remove the external forms
      var external = {};
      $('.cf7sg-external-form', $form).each(function(){
        var $exform = $(this);
        var id = $exform.data('form');
        external[id] = $exform.children('.cf7sg-external-form-content').remove();
        $exform.children('.form-controls').remove();
      });
      //remove the row controls
      $('.row', $form).removeClass('ui-sortable').children('.row-controls').remove();

      //remove the collapsible input
      $('.container.cf7sg-collapsible', $form).each(function(){
        var $this = $(this);
        var cid = $this.attr('id');
        var $title = $this.children('.cf7sg-collapsible-title');
        var text = $title.children('label').children('input[type="hidden"]').val();
        $title.children('label').remove();
        var toggle = '';
        if($this.is('.with-toggle')){
          toggle=' toggled';
        }
        text = '<span class="cf7sg-title'+toggle+'">'+text+'</span>';
        $title.html(text + $title.html());
      });
      //remove tabs inputs
      $('ul.cf7-sg-tabs-list li label', $form).remove();

      var cf7TagRegexp = /\[(.[^\s]*)\s*(.[^\s]*)(|\s*(.[^\[]*))\]/img;
      var cf7sgToggleRegex = /class:cf7sg-toggle-(.[^\s]+)/i;
      //remove textarea and embed its content
      $('.columns', $form).each(function(){
        var $this = $(this);
        $this.removeClass('ui-sortable');
        var $gridCol = $this.children('.grid-column');
        var $text = $('textarea.grid-input', $gridCol);
        if($text.length>0){
          text = $text.text();
          //verify if this column is within a toggled section.
          var $toggle = $this.closest('.container.cf7sg-collapsible.with-toggle');
          if($toggle.length>0){
            var cid = $toggle.attr('id');
            /**
            * track toggled checkbox/radio fields, because they are not submitted when not filled.
            *@since 2.1.5
            */
            var $field = $text.siblings('div.cf7-field-type');
            var isToggled = false;
            if($field.length>0){
              if($field.is('.checkbox.required') || $field.is('.radio') || $field.is('.file.required')) isToggled = true;
            }else isToggled = true; //custom column, needs checking.
            if(isToggled){
              var search = text;
              var match = cf7TagRegexp.exec(search);
              //var hasRadios = false;
              while (match != null) {
                switch(match[1]){
                  case 'checkbox*':
                  case 'radio':
                  case 'file*':
                    var options = '';
                    if(match.length>4){
                      var tglmatch = cf7sgToggleRegex.exec(match[4]);
                      if(tglmatch != null){
                        if(tglmatch[1] == cid) break;
                        options =match[4].replace(tglmatch[0],'class:cf7sg-toggle-'+cid);
                      }else{
                        options = 'class:cf7sg-toggle-'+cid+' '+match[4];
                      }
                    }else{
                      options = 'class:cf7sg-toggle-'+cid;
                    }
                    text = text.replace(match[0], '['+match[1]+' '+match[2]+' '+options+']');
                    //hasRadios = true;
                    break;
                }
                //console.log('match'+match[2]);
                match = cf7TagRegexp.exec(search); //get the next match.
              }
            }//end isToggled.
          }
          $this.html('\n'+text);
        }//else this column is a grid.
        $gridCol.remove();
      });
      //reinsert the external forms
      $('.cf7sg-external-form', $form).each(function(){
        var $this = $(this);
        var id = $this.data('form');
        $this.append( external[id] );
      });
      text = $form.html();
      if($grid.children('.container').length > 0){ //strip tabs/newlines
          text = text.replace(/^(?:[\t ]*(?:\r?\n|\r))+/gm, "");
      }
      return text;
    }
  });//dcoument ready end

})( jQuery, codeMirror_5_32);
