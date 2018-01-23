<?php if ( ! defined( 'ABSPATH' ) ) exit ?>
<h1><?= __( 'Edit static form 1', 'gs_form' ) ?></h1>

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="screen1">
                    <h4 class="panel-title">
                        <a role="button"
                           data-toggle="collapse"
                           data-parent="#accordion"
                           href="#cScreen1"
                           aria-expanded="true"
                           aria-controls="cScreen1">
                            <?= __( '1st screen', 'gs_form' ) ?>
                        </a>
                    </h4>
                </div>
                <div  id="cScreen1"
                      class="panel-collapse collapse in"
                      role="tabpanel"
                      aria-labelledby="screen1">
                    <form action="" method="post">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="gs_form_static1_1_title">
                                    <?= __( 'Title 1st screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_1_title"
                                       name="gs_form_static1_1_title"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_1_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_1_title' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static1_1_subtitle">
                                    <?= __( 'Subtitle 1st screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_1_subtitle"
                                       name="gs_form_static1_1_subtitle"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_1_subtitle.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_1_subtitle' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static1_1_button">
                                    <?= __( 'Button title for  1st screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_1_button"
                                       name="gs_form_static1_1_button"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_1_button.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_1_button' ) ?>">
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary"><?= __( 'Edit', 'gs_form' ) ?></button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="screen2">
                    <h4 class="panel-title">
                        <a  class="collapsed"
                            role="button"
                            data-toggle="collapse"
                            data-parent="#accordion"
                            href="#cScreen2"
                            aria-expanded="false"
                            aria-controls="cScreen2">
                            <?= __( '2nd screen', 'gs_form' ) ?>
                        </a>
                    </h4>
                </div>
                <div  id="cScreen2"
                      class="panel-collapse collapse"
                      role="tabpanel"
                      aria-labelledby="screen2">
                    <form action="" method="post">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="gs_form_static1_2_title">
                                    <?= __( 'Title 2nd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_2_title"
                                       name="gs_form_static1_2_title"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_2_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_2_title' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static1_2_subtitle">
                                    <?= __( 'Subtitle 2nd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_2_subtitle"
                                       name="gs_form_static1_2_subtitle"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_2_subtitle.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_2_subtitle' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static1_2_after">
                                    <?= __( 'Enter text after number for 2nd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_2_after"
                                       name="gs_form_static1_2_after"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_2_after.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_2_after' ) ?>">
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary"><?= __( 'Edit', 'gs_form' ) ?></button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="panel panel-default">
                <form action="" method="post">
                    <div class="panel-heading" role="tab" id="screen3">
                        <h4 class="panel-title">
                            <a role="button"
                               class="collapsed"
                               data-toggle="collapse"
                               data-parent="#accordion"
                               href="#cScreen3"
                               aria-expanded="false"
                               aria-controls="cScreen3">
                                <?= __( '3rd screen', 'gs_form' ) ?>
                            </a>
                        </h4>
                    </div>
                    <div  id="cScreen3"
                          class="panel-collapse collapse"
                          role="tabpanel"
                          aria-labelledby="screen3">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="gs_form_static1_3_title">
                                    <?= __( 'Title 3rd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_3_title"
                                       name="gs_form_static1_3_title"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_3_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_3_title' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static1_3_before">
                                    <?= __( 'Text before number for 3rd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_3_before"
                                       name="gs_form_static1_3_before"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_3_before.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_3_before' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static1_3_after">
                                    <?= __( 'Text after number for 3rd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_3_after"
                                       name="gs_form_static1_3_after"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_3_after.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_3_after' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static1_3_button">
                                    <?= __( 'Button title for 3rd screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_3_button"
                                       name="gs_form_static1_3_button"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_3_button.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_3_button' ) ?>">
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary"><?= __( 'Edit', 'gs_form' ) ?></button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="panel panel-default">
                <form action="" method="post">
                    <div class="panel-heading" role="tab" id="screen4">
                        <h4 class="panel-title">
                            <a role="button"
                               class="collapsed"
                               data-toggle="collapse"
                               data-parent="#accordion"
                               href="#cScreen4"
                               aria-expanded="false"
                               aria-controls="cScreen4">
                                <?= __( '4 screen', 'gs_form' ) ?>
                            </a>
                        </h4>
                    </div>
                    <div  id="cScreen4"
                          class="panel-collapse collapse"
                          role="tabpanel"
                          aria-labelledby="screen4">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="gs_form_static1_4_title">
                                    <?= __( 'Title 4 screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_4_title"
                                       name="gs_form_static1_4_title"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_4_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_4_title' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_static1_4_button">
                                    <?= __( 'Button title for 4 screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_static1_4_button"
                                       name="gs_form_static1_4_button"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_4_button.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_static1_4_button' ) ?>">
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary"><?= __( 'Edit', 'gs_form' ) ?></button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="panel panel-default">
                <form action="" method="post">
                    <div class="panel-heading" role="tab" id="screen5">
                        <h4 class="panel-title">
                            <a role="button"
                               class="collapsed"
                               data-toggle="collapse"
                               data-parent="#accordion"
                               href="#cScreen5"
                               aria-expanded="false"
                               aria-controls="cScreen5">
                                <?= __( 'Last screen', 'gs_form' ) ?>
                            </a>
                        </h4>
                    </div>
                    <div  id="cScreen5"
                          class="panel-collapse collapse"
                          role="tabpanel"
                          aria-labelledby="screen5">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="gs_form_last_title">
                                    <?= __( 'Title last screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_last_title"
                                       name="gs_form_last_title"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_l_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_last_title' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_last_subtitle">
                                    <?= __( 'Subtitle last screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_last_subtitle"
                                       name="gs_form_last_subtitle"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_l_subtitle.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_last_subtitle' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_last_1">
                                    <?= __( '1 step for last screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_last_1"
                                       name="gs_form_last_1"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_l1_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_last_1' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_last_2">
                                    <?= __( '2 step for last screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_last_2"
                                       name="gs_form_last_2"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_l2_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_last_2' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_last_3">
                                    <?= __( '3 step for last screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_last_3"
                                       name="gs_form_last_3"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_l3_title.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_last_3' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_last_before">
                                    <?= __( 'Text before number for last screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_last_before"
                                       name="gs_form_last_before"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_l_call.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_last_before' ) ?>">
                            </div>

                            <div class="form-group">
                                <label for="gs_form_last_after">
                                    <?= __( 'Text after number for last screen', 'gs_form' ) ?>:
                                </label>
                                <input type="text"
                                       id="gs_form_last_after"
                                       name="gs_form_last_after"
                                       class="form-control gspvi"
                                       data-img="<?= plugins_url( 'img/form1/form1_l_after_call.png', __FILE__ ) ?>"
                                       value="<?= get_option( 'gs_form_last_after' ) ?>">
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary"><?= __( 'Edit', 'gs_form' ) ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>