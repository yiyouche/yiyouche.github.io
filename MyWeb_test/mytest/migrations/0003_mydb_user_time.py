# Generated by Django 2.2.10 on 2020-03-01 01:38

from django.db import migrations, models
import django.utils.timezone


class Migration(migrations.Migration):

    dependencies = [
        ('mytest', '0002_mydb1'),
    ]

    operations = [
        migrations.AddField(
            model_name='mydb',
            name='user_time',
            field=models.DateTimeField(default=django.utils.timezone.now),
        ),
    ]
