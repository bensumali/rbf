<?php while ( have_posts() ) : the_post(); ?>
    <?php if(is_front_page()) : ?>
        <div id="rbf-homepage-background-video-container">
            <?php if($video = get_field( "background_video" )) : ?>
                <?php if( !wp_is_mobile() ): ?>
                    <video loop="true" muted="true" autoplay="true">
                        <source src="<?php echo $video ?>" type="video/mp4">
                    </video>
                <? endif; ?>
                <?php if($albumCover = get_field( "album_container" )["album_cover"]) : ?>
                    <div id="rbf-homepage-album-overlay-container">
                        <div id="rbf-homepage-album-cover-aligner">
                            <div id="rbf-homepage-album-cover-container">
                                <div id="rbf-homepage-album-cover-image">
                                    <img src="<?php echo $albumCover ?>" />
                                </div>
                                <div id="rbf-homepage-album-message">
                                    <div id="rbf-homepage-album-message-text">
                                        <?php echo nl2br(get_field( "album_container" )["container_message"]); ?>
                                    </div>
                                    <div id="rbf-homepage-album-message-buttons">
                                        <?php if($button1 = get_field( "album_container" )["button_1"]) : ?>
                                            <a href="<?php echo $button1["url"]; ?>" target="<?php if($button1["open_in_new_tab"]){ echo "_blank";  }?>"><?php echo $button1["text"]; ?></a>
                                        <?php endif; ?>
                                        <?php if($button2 = get_field( "album_container" )["button_2"]) : ?>
                                            <a href="<?php echo $button2["url"]; ?>" target="<?php if($button2["open_in_new_tab"]){ echo "_blank";  }?>"><?php echo $button2["text"]; ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif;?>
    <?php if(!is_front_page()) : ?>
        <div class="container">
            <?php if(is_page("music-videos")) : ?>
              <?php $videos = get_field("videos");
                if(count($videos) > 0 ) :?>
                  <h1 class="rbf-music-videos-header">FEATURED VIDEOS</h1>
                  <div class="rbf-music-videos-featured-videos-list">
                    <?php foreach($videos as $video) : ?>
                        <?php echo $video["youtube_video"]; ?>
                    <?php endforeach; ?>
                  </div>
              <?php endif; ?>
              <?php $albums = get_field("music")["album"];
                if(count($albums) > 0) : ?>
                  <h1 class="rbf-music-videos-header">ALBUMS</h1>
                  <div class="rbf-music-videos-albums-list">
                    <?php foreach($albums as $album) : ?>
                        <div class="rbf-music-videos-album-container row">
                          <div class="rbf-music-videos-album-cover col-md-5">
                            <img src="<?php echo $album["cover"]; ?>" />
                          </div>
                          <div class="rbf-music-videos-album-tracks-list col-md-6">
                            <?php foreach($album["track_list"]["song"] as $track) : ?>
                              <div class="rbf-music-videos-album-track-container">
                                <div class="rbf-music-videos-album-track-title"><?php echo $track["title"]; ?></div>
                                <div class="rbf-music-videos-album-track-duration"><?php echo $track["length"]; ?></div>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        </div>
                    <?php endforeach; ?>
                  </div>
              <?php endif; ?>
            <?php endif; ?>
            <?php if(is_page("tour-dates")) : ?>
                <div id="rbf-tour-dates-list">
                    <?php foreach(get_field("tour") as $tour) : ?>
                        <div class="rbf-tour-dates-tour-container">
                            <h1 class="rbf-tour-dates-tour-name-container">
                                <span class="rbf-tour-dates-tour-name"><?php echo $tour["tour_name"]; ?></span>
                            </h1>
                            <?php if(($tour["cancelled"] || $tour["postponed"]) && $tour["message"]) : ?>
                                <div class="rbf-tour-dates-tour-message"><?php print_r($tour["message"]); ?></div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="rbf-tour-dates-tour-event-photo col-md-4">
                                    <span>
                                        <span>
                                            <?php if($tour["cancelled"] || $tour["postponed"]) : ?>
                                                <span class="rbf-tour-dates-tour-cancelled-postponed-poster
                                                    <?php
                                                        $tourTag = "";
                                                        if($tour["cancelled"]) {
                                                            echo "cancelled";
                                                            $tourTag = "CANCELLED";
                                                        } else if($tour["postponed"]) {
                                                            echo "postponed";
                                                            $tourTag = "POSTPONED";
                                                        }
                                                        ?>"><?php echo $tourTag; ?></span>
                                            <?php endif; ?>
                                            <img src="<?php echo $tour["photo"]; ?>" />
                                        </span>
                                    </span>
                                </div>
                                <div class="rbf-tour-dates-tour-events-list col-md-8">
                                    <?php foreach($tour["events"] as $event) : ?>
                                        <div class="rbf-tour-dates-event-container">
                                            <div class="rbf-tour-dates-event-date">
                                                <?php if($event["cancelled"] || $event["date_changed"] || $event["sold_out"]) : ?>
                                                    <div class="rbf-tour-dates-event-date-changed-cancelled-sold-out
                                                        <?php
                                                            $message = "";
                                                            if($event["cancelled"]) {
                                                                $message = 'CANCELLED';
                                                                echo 'cancelled';
                                                            }
                                                            else if($event["date_changed"]) {
                                                                $message = 'DATE CHANGED';
                                                                echo 'date-changed';
                                                            }
                                                            if($event["sold_out"]) {
                                                                if($event["date_changed"]) {
                                                                    $message .= " - ";
                                                                }
                                                                $message .= "SOLD OUT";
                                                                echo " sold-out";
                                                            }
                                                        ?>">
                                                        <?php echo $message; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php $dateArray = explode(" ", $event["date"]);?>
                                                <div class="rbf-tour-dates-event-date-date"><?php echo $dateArray[1]; ?></div>
                                                <div class="rbf-tour-dates-event-date-month-year">
                                                    <div class="rbf-tour-dates-event-date-month">
                                                        <?php echo $dateArray[0]; ?>
                                                    </div>
                                                    <div class="rbf-tour-dates-event-date-year">
                                                        <?php echo $dateArray[2]; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rbf-tour-dates-event-location">
                                                <div class="rbf-tour-dates-event-venue"><?php echo $event["venue"]; ?></div>
                                                <div class="rbf-tour-dates-event-city-state"><?php echo $event["city"]; ?>, <?php if($event["country"] === "United States") { echo $event["state"]; } else { echo $event["country"]; }?></div>
                                            </div>
                                            <?php if(!$event["cancelled"] && !$event["sold_out"]) : ?>
                                                <div class="rbf-tour-dates-event-links-container">
                                                    <?php if($tickets = $event["link_tickets"]) : ?><a href="<?php echo $tickets; ?>">Tickets</a><?php endif; ?>
                                                    <?php if($rsvp = $event["link_rsvp"]) : ?><a href="<?php echo $rsvp; ?>">RSVP</a><?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($event["message"] && ($event["cancelled"] || $event["sold_out"] || $event["date_changed"])) : ?>
                                            <div class="rbf-tour-dates-event-message">
                                                <?php print_r($event["message"]); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if(is_page("band")) : ?>
                <div id="rbf-band-members-list">
                    <div class="row">
                        <?php
                            $members = get_field("members");
                            foreach($members as $member) :
                        ?>
                                <div class="rbf-band-member-container col-md-2">
                                    <div class="rbf-band-member-photo">
                                        <img src="<?php echo $member["photo"]; ?>" />
                                    </div>
                                    <div class="rbf-band-member-name-first">
                                        <?php echo $member["name_first"]; ?>
                                    </div>
                                    <div class="rbf-band-member-name-last">
                                        <?php echo $member["name_last"]; ?>
                                    </div>
                                    <div class="rbf-band-member-position">
                                        <?php echo $member["position"]; ?>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                        <div id="rbf-band-photo"><img src="<?php echo get_field("band_photo"); ?>"</div>
                    </div>
                </div>
                <div id="rbf-band-bio-container">
                    <?php echo get_field("bio"); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

<?php endwhile; ?>
