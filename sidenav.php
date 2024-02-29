<div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item">
                            <a href="index.php">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <?php
                        if($_SESSION['role'] == 'admin'){?>

                        
                        <li class="nav-item">
                            <a href="kriteria.php">
                                <span class="icon-holder">
                                    <i class="anticon anticon-folder-add"></i>
                                    <!-- <i class="anticon anticon-appstore"></i> -->
                                </span>
                                <span class="title">Kriteria</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="penilaian.php">
                                <span class="icon-holder">
                                    <i class="anticon anticon-calculator"></i>
                                </span>
                                <span class="title">Penilaian</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="hitung1.php">
                                <span class="icon-holder">
                                    <!-- <i class="anticon anticon-appstore"></i> -->
                                    <i class="anticon anticon-solution"></i>
                                </span>
                                <span class="title">Hitung</span>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="penilaian.php">
                                <span class="icon-holder">
                                    <i class="anticon anticon-calculator"></i>
                                </span>
                                <span class="title">Penilaian</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="history.php">
                                <span class="icon-holder">
                                    <!-- <i class="anticon anticon-appstore"></i> -->
                                    <i class="anticon anticon-solution"></i>
                                </span>
                                <span class="title">History</span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </div>