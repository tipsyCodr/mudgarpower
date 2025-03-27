<?php
include_once('partials/head.php'); 
require_once('root/db_connection.php');

// Get all active videos
$query = "SELECT * FROM video_gallery WHERE status = 1 ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get unique categories
$categories = array_unique(array_column($videos, 'category'));
?>
   
<style>
    .header{
        top: 0;
    }
        .video-card {
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }
        .video-card:hover {
            transform: translateY(-5px);
        }
        .video-thumbnail {
            position: relative;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            overflow: hidden;
            background: #000;
        }
        .video-thumbnail img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .play-button:hover {
            background: rgba(0, 0, 0, 0.9);
        }
        .play-button i {
            color: white;
            font-size: 24px;
        }
        .video-title {
            font-size: 1.1rem;
            margin: 10px 0;
            font-weight: 600;
        }
        .video-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        .video-category {
            display: inline-block;
            padding: 3px 8px;
            background: #f0f0f0;
            border-radius: 3px;
            font-size: 0.8rem;
            color: #666;
        }
        .modal-dialog {
            max-width: 800px;
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }
        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .category-filter {
            margin-bottom: 30px;
        }
        .category-filter .btn {
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>


    <div class="container mt-5" style="padding-top: 100px;">
        <h1 class="mb-4">Video Gallery</h1>
        
        <!-- Category Filter -->
        <div class="category-filter">
            <button class="btn btn-outline-primary active" data-category="all">All Videos</button>
            <?php foreach ($categories as $category): ?>
                <?php if ($category): ?>
                    <button class="btn btn-outline-primary" data-category="<?php echo htmlspecialchars($category); ?>">
                        <?php echo htmlspecialchars($category); ?>
                    </button>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Video Grid -->
        <div class="row">
            <?php foreach ($videos as $video): ?>
                <div class="col-md-4 video-item" data-category="<?php echo htmlspecialchars($video['category']); ?>">
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <?php if ($video['thumbnail']): ?>
                                <img src="<?php echo htmlspecialchars($video['thumbnail']); ?>" alt="<?php echo htmlspecialchars($video['title']); ?>">
                            <?php else: ?>
                                <img src="assets/images/default-thumbnail.jpg" alt="Default thumbnail">
                            <?php endif; ?>
                            <div class="play-button" data-video-id="<?php echo $video['id']; ?>">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <h3 class="video-title"><?php echo htmlspecialchars($video['title']); ?></h3>
                        <p class="video-description"><?php echo htmlspecialchars($video['description']); ?></p>
                        <?php if ($video['category']): ?>
                            <span class="video-category"><?php echo htmlspecialchars($video['category']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="video-container">
                        <div id="videoPlayer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Category filter
            $('.category-filter .btn').click(function() {
                $('.category-filter .btn').removeClass('active');
                $(this).addClass('active');
                
                var category = $(this).data('category');
                if (category === 'all') {
                    $('.video-item').show();
                } else {
                    $('.video-item').hide();
                    $('.video-item[data-category="' + category + '"]').show();
                }
            });
            
            // Video player
            var videoModal = $('#videoModal');
            var videoPlayer = $('#videoPlayer');
            
            $('.play-button').click(function() {
                var videoId = $(this).data('video-id');
                
                // Get video details via AJAX
                $.get('get_video_details.php', { id: videoId }, function(video) {
                    videoModal.find('.modal-title').text(video.title);
                    
                    if (video.video_type === 'embedded') {
                        // Handle embedded video (YouTube/Vimeo)
                        var embedUrl = '';
                        if (video.video_url.includes('youtube.com') || video.video_url.includes('youtu.be')) {
                            var videoId = video.video_url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i)[1];
                            embedUrl = 'https://www.youtube.com/embed/' + videoId;
                        } else if (video.video_url.includes('vimeo.com')) {
                            var videoId = video.video_url.match(/vimeo\.com\/([0-9]+)/)[1];
                            embedUrl = 'https://player.vimeo.com/video/' + videoId;
                        }
                        
                        videoPlayer.html('<iframe src="' + embedUrl + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
                    } else {
                        // Handle local video
                        videoPlayer.html('<video controls><source src="' + video.local_video + '" type="video/mp4">Your browser does not support the video tag.</video>');
                    }
                    
                    videoModal.modal('show');
                });
            });
            
            // Clear video player when modal is closed
            videoModal.on('hidden.bs.modal', function() {
                videoPlayer.empty();
            });
        });
    </script>
<?php include_once('partials/footer.php'); ?> 