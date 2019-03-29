<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $connection = 'sqlsrv_DLF_livedata';
    protected $table = 'AS_user_question_answers';

    protected $fillable = ['user_topic_id', 'question_id', 'answer_id'];

    public function UserTopic()
    {
        return $this->belongsTo('App\UserTopic', 'user_topic_id');
    }

    // public function questionDisclaimers()
    // {

    //     return $this->hasMany('App\QuestionAnswerDisclaimer', 'questionid', 'question_id');

    // }

    public function questionDisclaimers()
    {
        return $this->hasMany('App\QuestionAnswerDisclaimer', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    }

    public function questionIdeas()
    {
        return $this->hasMany('App\QuestionAnswerIdea', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    }

    public function questionProducts()
    {
        return $this->hasMany('App\QuestionAnswerProduct', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    }

    public function questionGroupProducts()
    {
        return $this->hasMany('App\QuestionAnswerGroup', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    }

    // public function questionAnswerAuthorities()
    // {
    //     return $this->hasMany('App\DisclaimerAuthority', ['questionid', 'answerid'], ['question_id', 'answer_id']);
    // }

    // public function questionAnswerProducts()
    // {
    //     $products = QuestionAnswerProduct::where('questionid', $this->question_id)
    //         ->where('answerid', $this->answer_id)
    //         ->with('product')
    //         ->get()->flatten();
    //     return $products;
    // }

    // public function questionAnswerGroups()
    // {
    //     $groups = QuestionAnswerGroup::where('questionid', $this->question_id)
    //         ->where('answerid', $this->answer_id)
    //         ->with('group')
    //         ->get()->flatten();
    //     return $groups;
    // }

    /**
     *  getQuestionDisclaimers function returns all the disclaimers for the question and answer based on condtions and authority
     *
     * @param $userAnswers Collection
     * @param [type] $authority
     * @return disclaimers
     */
    public function getQuestionDisclaimers($userAnswers, $authority)
    {

        if (!$this->questionDisclaimers->count()) {
            return false;
        }

        $disclaimers = collect();
        foreach ($this->questionDisclaimers as $questionDisclaimer) {
            if (!$questionDisclaimer->disclaimerConditions->count() || $questionDisclaimer->isConditionPassed($userAnswers)) {
                if ($questionDisclaimer->disclaimerAuthority->firstWhere('authority_id', $authority->authority_id)) {
                    $disclaimers->push($questionDisclaimer->disclaimer);
                }
            }
        }

        return $disclaimers;
    }

    public function getQuestionIdea($userAnswers, $authority)
    {
        if (!$this->questionIdeas->count()) {
            return false;
        }

        // \Debugbar::error((int)floor(4.55));
        $ideas = collect();
        foreach ($this->questionIdeas->sortBy('displayposition') as $questionIdea) {

            if (!$questionIdea->ideaConditions->count() || $questionIdea->isConditionPassed($userAnswers)) {
                if ($questionIdea->ideaAuthorities->firstWhere('authority_id', $authority->authority_id)) {
                    $ideas->push($questionIdea->idea);
                }
            }
        }

        return $ideas;
    }

    public function getRelatedProducts($userAnswers, $authority)
    {
        if (!$this->questionProducts->count()) {
            return false;
        }

        $products = collect();
        foreach ($this->questionProducts->sortBy('order') as $questionProduct) {
            if (!$questionProduct->productConditions->count() || $questionProduct->isConditionPassed($userAnswers)) {
                if ($v = $questionProduct->productAuthorities->whereIn('product_id', $questionProduct->product_id)->firstWhere('authority_id', $authority->authority_id)) {
                    $products->push($questionProduct->product);
                }
            }
        }

        return $products;
    }

    public function getRelatedGroupProducts($userAnswers, $authority)
    {
        if (!$this->questionGroupProducts->count()) {
            return false;
        }

        $groupProducts = collect();
        //  \Debugbar::warning($this->questionGroupProducts);

        foreach ($this->questionGroupProducts as $questionGroupProduct) {
            if (!$questionGroupProduct->conditions->count() || $questionGroupProduct->isConditionPassed($userAnswers)) {
                if ($questionGroupProduct->authorities->firstWhere('authority_id', $authority->authority_id)) {
                    $groupProducts->push($questionGroupProduct->groupProduct);
                }
            }
        }
        return $groupProducts;
    }

    public function getIdeasWithProdcuts($userAnswers, $authority)
    {
        $questionIdeas = $this->questionIdeas->sortBy('displayposition');
        $questionProducts = $this->questionProducts->sortBy('order');
        $questionGroupProducts = $this->questionGroupProducts->sortBy('order');
        $ideasAndProducts = collect();

        /**
         * loop through each questionAnswerIdea and compare the display postion with questionAnswerProduct and questionAnswerGroupProduct. If matches add to the collection with product or group product
         */

        if ($questionIdeas->count()) {

            foreach ($questionIdeas as $questionIdea) {
                if (!$questionIdea->ideaConditions->count() || $questionIdea->isConditionPassed($userAnswers)) {
                    if ($questionIdea->ideaAuthorities->firstWhere('authority_id', $authority->authority_id)) {
                        $idea = $questionIdea->idea;
                        $ideaProducts = new \stdClass;
                        $ideaProducts->idea = $questionIdea->idea;
                        $ideaProducts->products = $questionProducts->filter(function ($product) use ($questionIdea, $userAnswers, $authority) {
                            $order = (int) $product->order;

                            if (!$product->productConditions->count() || $product->isConditionPassed($userAnswers)) {
                                if ($product->productAuthorities->firstWhere('authority_id', $authority->authority_id)) {
                                    \Debugbar::warning($product);
                                    \Debugbar::warning('here1');
                                    return $questionIdea->displayposition == $order;
                                }
                            }

                            return false;
                        })->pluck('product');
                        $ideaProducts->groupProducts = $questionGroupProducts->filter(function ($group) use ($questionIdea, $userAnswers, $authority) {
                            $order = (int) $group->order;

                            if (!$group->conditions->count() || $group->isConditionPassed($userAnswers)) {
                                if ($group->authorities->firstWhere('authority_id', $authority->authority_id)) {
                                    return $questionIdea->displayposition == $order;
                                }
                            }

                            return false;

                        })->pluck('groupProduct');
                        // \Debugbar::warning($ideaProducts->groupProducts);

                        $ideasAndProducts->push($ideaProducts);
                    }
                }
            }
        }
        // elseif ($questionProducts->count()) {
        //     foreach ($questionProducts->sortBy('displayposition') as $questionIdea) {

        //         if (!$questionIdea->ideaConditions->count() || $questionIdea->isConditionPassed($userAnswers)) {
        //             if ($questionIdea->ideaAuthorities->firstWhere('authority_id', $authority->authority_id)) {
        //                 $ideaProducts = new \stdClass;
        //                 $ideaProducts->idea = '';
        //                 $ideaProducts->product = '';
        //                 $ideaProducts->groupProduct = '';

        //                 $ideasAndProducts->push($ideaProducts);
        //             }
        //         }
        //     }

        // } elseif ($questionGroupProducts->count()) {
        //     foreach ($questionGroupProducts->sortBy('displayposition') as $questionIdea) {

        //         if (!$questionIdea->ideaConditions->count() || $questionIdea->isConditionPassed($userAnswers)) {
        //             if ($questionIdea->ideaAuthorities->firstWhere('authority_id', $authority->authority_id)) {
        //                 $ideaProducts = new \stdClass;
        //                 $ideaProducts->idea = '';
        //                 $ideaProducts->product = '';
        //                 $ideaProducts->groupProduct = '';

        //                 $ideasAndProducts->push($ideaProducts);
        //             }
        //         }
        //     }
        // }
        return $ideasAndProducts;
    }
}
