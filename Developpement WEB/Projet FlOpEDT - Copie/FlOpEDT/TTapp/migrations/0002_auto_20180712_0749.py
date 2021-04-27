# Generated by Django 2.0.7 on 2018-07-12 07:49

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        ('base', '0001_initial'),
        ('TTapp', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='stabilize',
            name='group',
            field=models.ForeignKey(default=None, null=True, on_delete=django.db.models.deletion.CASCADE, to='base.Group'),
        ),
        migrations.AddField(
            model_name='stabilize',
            name='module',
            field=models.ForeignKey(default=None, null=True, on_delete=django.db.models.deletion.CASCADE, to='base.Module'),
        ),
        migrations.AddField(
            model_name='stabilize',
            name='train_prog',
            field=models.ForeignKey(default=None, null=True, on_delete=django.db.models.deletion.CASCADE, to='base.TrainingProgramme'),
        ),
    ]
