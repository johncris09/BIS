<?php
  $role = (isset($_SESSION['status']))  ? $_SESSION['status'] : null;
?>
            
            <!-- Side Bar Left -->
            <aside id="sidebar-left" class="sidebar-left">  
              <div class="sidebar-header">
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                  <i class="fa fa-tasks" aria-label="Toggle sidebar"></i>
                </div>
              </div>
              <div class="nano">
                <div class="nano-content">
                  <nav id="menu" class="nav-main" role="navigation">
                    <ul class="nav nav-main">
                      <li class="nav-active">
                        <a href="index.php">
                          <i class="fa fa-dashboard" aria-hidden="true"></i>
                          <span>Dashboard</span>
                        </a>
                      </li>
                    <?php if($role == 0){ ?>
                      
                      <li class="nav-parent">
                        <a>
                          <i class="fa fa-map-marker" aria-hidden="true"></i>
                          <span>Barangay &amp; Streets</span>
                        </a>
                        <ul class="nav nav-children">
                          <li>
                            <a href="barangay.php">
                                Barangay
                            </a>
                          </li>
                          <li>
                            <a href="street.php">
                              Street
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-parent">
                        <a>
                          <i class="fa fa-sitemap" aria-hidden="true"></i>
                          <span>Barangay Position</span>
                        </a>
                        <ul class="nav nav-children">
                          <li>
                            <a id="link-to-position" href="position.php">
                              Position
                            </a>
                          </li>
                        </ul>
                      </li>
                      
                      <li class="nav-parent">
                        <a>
                          <i class="fa fa-user" aria-hidden="true"></i>
                          <span>User</span>
                        </a>
                        <ul class="nav nav-children">
                          <li>
                            <a href="all-users.php">
                                All Users
                            </a>
                          </li>
                          <li>
                            <a href="new-user.php">
                                Add New User
                            </a>
                          </li>
                          <li>
                            <a href="profile.php">
                                Your Profile
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav">
                        <a href="population.php">
                          <i class="fa fa-dashboard" aria-hidden="true"></i>
                          <span>Population</span>
                        </a>
                      </li>
                      <li class="nav-parent">
                        <a>
                          <i class="fa fa-gears" aria-hidden="true"></i>
                          <span>Utilities</span>
                        </a>
                        <ul class="nav nav-children">
                          <li>
                            <a href="back-up-records.php">
                                Back up Records
                            </a>
                          </li>
                        </ul>
                      </li>
                    <?php }else{ ?>
                      <li class="nav-parent">
                      <a>
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        <span>Residence Profiling</span>
                      </a>
                      <ul class="nav nav-children">
                        <li>
                          <a href="all-resident.php">
                              All Resident
                          </a>
                        </li>
                        <li>
                          <a href="new-resident.php">
                              Add New Resident
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-parent">
                      <a>
                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                        <span>Barangay Issue</span>
                      </a>
                      <ul class="nav nav-children">
                        <li>
                          <a href="all-issue.php">
                              All Issue
                          </a>
                        </li>
                        <li>
                          <a href="new-issue.php">
                              Add New Issue
                          </a>
                        </li>
                      </ul>
                    </li>
                    <!-- <li class="nav-parent">
                      <a>
                        <i class="fa fa-gears" aria-hidden="true"></i>
                        <span>Utilities</span>
                      </a>
                      <ul class="nav nav-children">
                        <li>
                          <a href="back-up-records.php">
                              Back up Records
                          </a>
                        </li>
                      </ul>
                    </li> -->
                    <li>
                    <a href="profile.php">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                    <?php } ?>  
                    </ul>
                  </nav>
                  <hr class="separator" />
                  <!-- <ul class="nav nav-main">
                    <li class="nav-parent">
                      <a>
                        <i class="fa fa-columns" aria-hidden="true"></i>
                        <span>Layouts</span>
                      </a>
                      <ul class="nav nav-children">
                        <li>
                          <a style="cursor: pointer" id="layout-default">Default</a>
                        </li>
                        <li>
                        <a style="cursor: pointer" id="layout-boxed">Boxed</a>
                        </li>
                        <li>
                          <a style="cursor: pointer" id="layout-menu-collapsed">Menu Collapsed</a>
                        </li>
                        <li>
                          <a style="cursor: pointer" id="layouts-scroll">Scroll</a>
                        </li>
                      </ul>
                    </li>
                  </ul> -->
                </div>
              </div>
            </aside>


