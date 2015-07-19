<div>

</div>

<div style="visibility: inherit">
    <div class="clearfix">
        <article class="module width_full">
            <?php echo $this->Form->create('Quote');?>
            <header><h3>Add Quote</h3></header>
            <div class="module_content">
                <fieldset>
                    <?php echo $this->Form->input('subject', ['label' => 'Quote Subject']);?>
                </fieldset>

                <fieldset>
                    <?php echo $this->Form->input('customer_id');?>
                </fieldset>

                <fieldset style="width:52%;">
                    <!-- to make two field float next to one another, adjust values accordingly -->
                    <?php echo $this->Form->input('date_of_setup', ['label' => 'Setup Date']);?>
                    <?php echo $this->Form->input('date_of_event', ['label' => 'Date of Event']);?>
                </fieldset>
                <fieldset style="width:52%;">
                    <?php
                    echo $this->Form->input('mode_of_receipt',
                        ['options' => ['SMS', 'Email', 'In Person'], 'label' => 'Mode of receipt']);?>
                </fieldset>

            </div>

        </article>
        <!-- end of post new article -->
        <article class="module width_full">
            <header><h3>Additional Information</h3></header>
            <div class="module_content clearfix">
                <div style="float: left; width: 48%;padding-right: 2%">
                    <h3>Billing Address</h3>
                    <fieldset>
                        <?php echo $this->Form->input('QuoteShipments.address', ['label' => 'Address','cols'=>5]);?>
                    </fieldset>


                    <fieldset>
                        <?php echo $this->Form->input('QuoteShipments.city', ['label' => 'City','options'=>['lagos'=>'Lagos']]);?>
                    </fieldset>

                    <fieldset>
                        <?php
                        echo $this->Form->input('QuoteShipments.state',
                            ['options' => ['lagos'=>'Lagos'], 'label' => 'State']);?>
                    </fieldset>
                </div>
                <div style="float:left; width: 48%; padding-right: 2%">
                    <h3>Notes</h3>
                    <fieldset>
                        <?php echo $this->Form->input('QuoteShipments.note', ['label' => '', 'cols' => 3]);?>
                    </fieldset>
                </div>
            </div>

        </article>
    </div>
    <?php echo $this->Form->button(__('Submit'));
    echo $this->Form->end();
    ?>
    <div>

        <article class="module width_full" style="visibility: hidden">
            <header><h3>&nbsp;</h3></header>
            <div class="module_content">
                <fieldset>
                    <?php echo $this->Form->input('subject', ['label' => 'Contact Name']);?>
                </fieldset>

                <fieldset>
                    <?php echo $this->Form->input('subject', ['label' => 'Account Name']);?>
                </fieldset>

                <fieldset>
                    <?php echo $this->Form->input('subject', ['label' => 'Assign to User']);?>
                </fieldset>

            </div>
        </article>
    </div>
</div>