from django.forms import ModelForm
from .models import Post

# Create the form class.
class PostForm(ModelForm):
    class Meta:
         model = Post
         fields = ['Nom','Room','Date','start_time','Duration']

# Creating a form to add an article.
form = PostForm()

# Creating a form to change an existing article.
post = Post.objects.get(pk=1)
form = PostForm(instance=post)
