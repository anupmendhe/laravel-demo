<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplateModel extends Model
{
    use HasFactory;
    
    protected $table   =  'email_template';

    protected $fillable = [
                            'template_name',
                            'template_from',
                            'template_from_mail',
                            'template_subject',
                            'template_html'
                          ];
}
