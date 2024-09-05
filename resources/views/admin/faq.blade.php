@extends('admin.dash')

@section('admin') 

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.Faq') }}" class="btn btn-inverse-info">Add QUESTIONS</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">QUESTIONS FRÉQUEMMENT POSÉES</h6>
                    <div class="accordion" id="FaqAccordion">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const faqs = @json($faq); 

        const faqAccordion = document.getElementById('FaqAccordion');

        faqs.forEach((item, index) => {
        
            const accordionItem = document.createElement('div');
            accordionItem.className = 'accordion-item';

           
            const accordionHeader = document.createElement('h2');
            accordionHeader.className = 'accordion-header';
            accordionHeader.id = `heading${index}`;

          
            const accordionButton = document.createElement('button');
            accordionButton.className = 'accordion-button';
            accordionButton.type = 'button';
            accordionButton.dataset.bsToggle = 'collapse';
            accordionButton.dataset.bsTarget = `#collapse${index}`;
            accordionButton.setAttribute('aria-expanded', index === 0 ? 'true' : 'false');
            accordionButton.setAttribute('aria-controls', `collapse${index}`);
            accordionButton.textContent = item.question;

            
            accordionHeader.appendChild(accordionButton);

            const accordionCollapse = document.createElement('div');
            accordionCollapse.id = `collapse${index}`;
            accordionCollapse.className = `accordion-collapse collapse ${index === 0 ? 'show' : ''}`;
            accordionCollapse.setAttribute('aria-labelledby', `heading${index}`);
            accordionCollapse.dataset.bsParent = '#FaqAccordion';

            
            const accordionBody = document.createElement('div');
            accordionBody.className = 'accordion-body';
            accordionBody.textContent = item.reponse;

            
            accordionCollapse.appendChild(accordionBody);

           
            accordionItem.appendChild(accordionHeader);
            accordionItem.appendChild(accordionCollapse);

           
            faqAccordion.appendChild(accordionItem);
        });
    });
</script>

@endsection
