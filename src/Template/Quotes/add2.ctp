<div class="clearfix">
    <article class="module width_half">
        <header><h3>Add Quote</h3></header>
        <div class="module_content">
            <fieldset>
                <?php echo $this->Form->input('subject',['label'=>'Quote Subject']);?>
            </fieldset>

            <fieldset>
                <?php echo $this->Form->input('subject',['label'=>'Quote Number']);?>
            </fieldset>

            <fieldset style="width:52%;"> <!-- to make two field float next to one another, adjust values accordingly -->
                <?php echo $this->Form->input('subject',['label'=>'Valid until']);?>
            </fieldset>
            <fieldset style="width:52%;">
                <?php
                echo $this->Form->input('mode_of_receipt',
                    ['options'=>['SMS','Email','In Person'],'label'=>'Quote Stage']);?>
            </fieldset>

        </div>

    </article><!-- end of post new article -->
    <article class="module width_half">
        <header><h3>&nbsp;</h3></header>
        <div class="module_content">
            <fieldset>
                <?php echo $this->Form->input('subject',['label'=>'Contact Name']);?>
            </fieldset>

            <fieldset>
                <?php echo $this->Form->input('subject',['label'=>'Account Name']);?>
            </fieldset>

            <fieldset>
                <?php echo $this->Form->input('subject',['label'=>'Assign to User']);?>
            </fieldset>

        </div>
    </article>
</div>
<div>
    <article class="module width_full">
        <header><h3>Additional Information</h3></header>
        <div class="module_content clearfix">
            <div style="float: left; width: 48%;padding-right: 2%">
                <h3>Billing Address</h3>
                <fieldset>
                    <?php echo $this->Form->input('subject',['label'=>'Street']);?>
                    <?php echo $this->Form->input('subject',['label'=>'']);?>
                </fieldset>


                <fieldset>
                        <?php echo $this->Form->input('subject',['label'=>'City']);?>
                </fieldset>

                <fieldset>
                    <?php
                    echo $this->Form->input('mode_of_receipt',
                        ['options'=>['SMS','Email','In Person'],'label'=>'State']);?>
                </fieldset>
            </div>
            <div style="float:left; width: 48%; padding-right: 2%">
                <h3>Notes</h3>
                <fieldset>
                    <?php echo $this->Form->input('subject',['label'=>'','cols'=>1]);?>
                </fieldset>
            </div>


        </div>

    </article>
</div>