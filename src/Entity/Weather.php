<?php

namespace App\Entity;

use App\Repository\WeatherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeatherRepository::class)]
class Weather
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date;

    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $sunrise;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $sunset;

    #[ORM\Column(type: 'float')]
    private ?float $temperature;

    #[ORM\Column(type: 'float')]
    private ?float $temperatureMin;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $temperatureMax;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $moonrise;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $moonset;

    #[ORM\Column(type: 'float')]
    private ?float $moonPhase;

    #[ORM\OneToMany(mappedBy: 'weather', targetEntity: Hour::class, orphanRemoval: true)]
    private $hours;

    #[ORM\OneToOne(targetEntity: Summary::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $summary;

    public function __construct()
    {
        $this->hours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getSunrise(): ?\DateTimeInterface
    {
        return $this->sunrise;
    }

    public function setSunrise(\DateTimeInterface $sunrise): self
    {
        $this->sunrise = $sunrise;

        return $this;
    }

    public function getSunset(): ?\DateTimeInterface
    {
        return $this->sunset;
    }

    public function setSunset(\DateTimeInterface $sunset): self
    {
        $this->sunset = $sunset;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getTemperatureMin(): ?float
    {
        return $this->temperatureMin;
    }

    public function setTemperatureMin(float $temperatureMin): self
    {
        $this->temperatureMin = $temperatureMin;

        return $this;
    }

    public function getTemperatureMax(): ?string
    {
        return $this->temperatureMax;
    }

    public function setTemperatureMax(string $temperatureMax): self
    {
        $this->temperatureMax = $temperatureMax;

        return $this;
    }

    public function getMoonrise(): ?\DateTimeInterface
    {
        return $this->moonrise;
    }

    public function setMoonrise(\DateTimeInterface $moonrise): self
    {
        $this->moonrise = $moonrise;

        return $this;
    }

    public function getMoonset(): ?\DateTimeInterface
    {
        return $this->moonset;
    }

    public function setMoonset(\DateTimeInterface $moonset): self
    {
        $this->moonset = $moonset;

        return $this;
    }

    public function getMoonPhase(): ?float
    {
        return $this->moonPhase;
    }

    public function setMoonPhase(float $moonPhase): self
    {
        $this->moonPhase = $moonPhase;

        return $this;
    }

    /**
     * @return Collection<int, Hour>
     */
    public function getHours(): Collection
    {
        return $this->hours;
    }

    public function addHour(Hour $hour): self
    {
        if (!$this->hours->contains($hour)) {
            $this->hours[] = $hour;
            $hour->setWeather($this);
        }

        return $this;
    }

    public function removeHour(Hour $hour): self
    {
        if ($this->hours->removeElement($hour)) {
            // set the owning side to null (unless already changed)
            if ($hour->getWeather() === $this) {
                $hour->setWeather(null);
            }
        }

        return $this;
    }

    public function getSummary(): ?Summary
    {
        return $this->summary;
    }

    public function setSummary(Summary $summary): self
    {
        $this->summary = $summary;

        return $this;
    }
}
