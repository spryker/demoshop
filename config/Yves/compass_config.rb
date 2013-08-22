# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "../project/Yves/public/styles"
sass_dir = "../project/Yves/public/sass"
images_dir = "../project/Yves/public/images"
javascripts_dir = "../project/Yves/public/scripts"
generated_images_dir = "../project/Yves/public/images/sprites"

http_images_path = "../images"
http_stylesheets_path = "/styles"
http_generated_images_path = "../images/sprites"
http_javascripts_path = "/scripts"

if environment == :production
  output_style  = :compressed
else
  line_comments = true
  output_style  = :expanded
  sass_options  = { :debug_info => true }
end
