<?php if ( ! defined( 'ABSPATH' ) ) exit ?>
<h1><?= __( 'Edit static form 1', 'gs_form' ) ?></h1>
        <form method="post">
            <div class="form-group">
                <label for="gs_form_static2_2_steps">
                    <?= __( 'Steps ( separated by commas )', 'gs_form' ) ?>:
                </label>
                <input type="text"
                       id="gs_form_static2_2_steps"
                       name="gs_form_static2_2_steps"
                       class="form-control gspvi"
                       data-img="<?= plugins_url( 'img/form2/form2_steps.png', __FILE__ ) ?>"
                       value="<?= get_option( 'gs_form_static2_2_steps' ) ?>">
            </div>

            <button class="btn btn-primary"><?= __( 'Edit', 'gs_form' ) ?></button>
        </form>
        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="screen6">
                    <h4 class="panel-title">
                        <a role="button"
                           data-toggle="collapse"
                           data-parent="#accordion2"
                           href="#cScreen6"
                           aria-expanded="true"
                           aria-controls="cScreen6">
                            <?= __( '1st screen', 'gs_form' ) ?>
                        </a>
                    </h4>
                </div>
                <div  id="cScreen6"
                      class="panel-collapse collapse in"
                      role="tabpanel"
                      aria-labelledby="screen6">
                    <form action="" method="post">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="gs_form_static2_1_title">
                                    <?= __( 'Title 1st screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static2_1_title"
                                       name="gs_form_static2_1_title"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form2/form2_1_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static2_1_title' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static2_1_subtitle">
                                    <?= __( 'Subtitle 1st screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static2_1_subtitle"
                                       name="gs_form_static2_1_subtitle"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form2/form2_1_subtitle.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static2_1_subtitle' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static2_1_button">
                                    <?= __( 'Button title for  1st screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static2_1_button"
                                       name="gs_form_static2_1_button"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form2/form2_1_button.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static2_1_button' ) ?>">
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary"><?= __( 'Edit', 'gs_form' ) ?></button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="screen7">
                    <h4 class="panel-title">
                        <a role="button"
                           class="collapsed"
                           data-toggle="collapse"
                           data-parent="#accordion2"
                           href="#cScreen7"
                           aria-expanded="true"
                           aria-controls="cScreen7">
                            <?= __( '2nd screen', 'gs_form' ) ?>
                        </a>
                    </h4>
                </div>
                <div  id="cScreen7"
                      class="panel-collapse collapse"
                      role="tabpanel"
                      aria-labelledby="screen7">
                    <form action="" method="post">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="gs_form_static2_2_title">
                                    <?= __( 'Title 2nd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static2_2_title"
                                       name="gs_form_static2_2_title"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form2_2_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static2_2_title' ) ?>">
                            </div>



                            <div class="form-group">
                                <label for="gs_form_static2_2_button">
                                    <?= __( 'Button title for  2nd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static2_2_button"
                                       name="gs_form_static2_2_button"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form2_2_button.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static2_2_button' ) ?>">
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary"><?= __( 'Edit', 'gs_form' ) ?></button>
                        </div>
                    </form>
                </div>

            </div>

        </div>